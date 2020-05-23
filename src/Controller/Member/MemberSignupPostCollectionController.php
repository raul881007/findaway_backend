<?php

namespace App\Controller\Member;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Member;
use App\Entity\MemberGoals;
use App\Entity\MemberTask;
use App\Entity\NGoals;
use App\Entity\NTask;
use App\Entity\Language;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Class MemberSignupPostCollectionController
 * @package App\Controller\User
 */
class MemberSignupPostCollectionController extends BaseUserController
{
    /**
     * @param Request $request
     * @param Member $data
     * @param ValidatorInterface $validator
     * @param \Swift_Mailer $mailer
     * @param ParameterBagInterface $params
     * @param EntityManagerInterface $em
     * @param LoggerInterface $logger
     * @return Member
     * @throws \Exception
     */
    public function __invoke(
        Request $request,
        Member $data,
        ValidatorInterface $validator,
        \Swift_Mailer $mailer,
        ParameterBagInterface $params,
        LoggerInterface $logger,
        EntityManagerInterface $em
    ): Member {
        $data->setToken(\bin2hex(\random_bytes(32)));
        $data->setTokenCreatedAt(new \DateTime());

        /** @var Member $data */
        $data = $this->encodePassword($data);

        $validator->validate($data, ['groups' => 'signup']);


        $paramsRequest = json_decode($request->getContent());
        $language = $em->getRepository(Language::class)->findOneBy(['code' => $paramsRequest->language]);
        $data->setLanguage($language);
        $em->persist($data);
        if (isset($paramsRequest->memberGoals)) {
            foreach ($paramsRequest->memberGoals as $mgoals) {
                $membergoals = new MemberGoals();
                $membergoals->setName($mgoals);
                $em->persist($membergoals);
                $data->addMemberGoal($membergoals);
            }
        }

        if (isset($paramsRequest->memberTask)) {
            foreach ($paramsRequest->memberTask as $mtasks) {
                $membertasks = new MemberTask();
                $membertasks->setName($mtasks);
                $em->persist($membertasks);
                $data->addMemberTask($membertasks);
            }
        }

        if (isset($paramsRequest->nGoals)) {
            foreach ($paramsRequest->nGoals as $ngoals) {
                $goals = $em->getRepository(NGoals::class)->find($ngoals->id);
                $data->addNGoal($goals);
            }
        }

        if (isset($paramsRequest->nTask)) {
            foreach ($paramsRequest->nTask as $ntask) {
                $task = $em->getRepository(NTask::class)->find($ntask->id);
                $data->addNTask($task);
            }
        }

        $em->flush();
        try {
            $message = (new \Swift_Message())
                ->setSubject('Confirm registration')
                ->setFrom('admin@joinfindaway.com')
                ->setTo($data->getEmail())
                ->setBody(
                    $this->renderView(
                        'emails/signup.html.twig',
                        [
                            'user' => $data,
                            'url' => sprintf('%s%s%s', $params->get('client_url'), '/token/member/login/', $data->getToken()),
                        ]
                    ),
                    'text/html'
                );

            $mailer->send($message);
        } catch (\Exception $e) {}
        $url = sprintf('%s%s%s', $params->get('client_url'), '/token/member/login/', $data->getToken());
        $logger->info('Entra a ' .$url);


        return $data;
    }
}
