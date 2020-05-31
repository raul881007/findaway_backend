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
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class MemberSignupMovPostCollectionController
 * @package App\Controller\User
 */
class MemberSignupMovPostCollectionController extends BaseUserController
{
    /**
     * @param Request $request
     * @param Member $data
     * @param ValidatorInterface $validator
     * @param ParameterBagInterface $params
     * @param EntityManagerInterface $em
     * @return Member
     * @throws \Exception
     */
    public function __invoke(
        Request $request,
        Member $data,
        ValidatorInterface $validator,
        ParameterBagInterface $params,
        EntityManagerInterface $em
    ): Member {
        $data->setToken(\bin2hex(\random_bytes(32)));
        $data->setTokenCreatedAt(new \DateTime());

        /** @var Member $data */
        $data = $this->encodePassword($data);
        $params = json_decode($request->getContent());
        $language = $em->getRepository(Language::class)->findOneBy(['code' => $params->language]);
        $data->setLanguage($language);
        $validator->validate($data, ['groups' => 'signup']);
        $em->persist($data);
        if (isset($params->memberGoals)) {
	        $order=1;
            foreach ($params->memberGoals as $mgoals) {
                $membergoals = new MemberGoals();
                $membergoals->setName($mgoals);
                $membergoals->setOrder($order);
                $em->persist($membergoals);
                $data->addMemberGoal($membergoals);
                $order++;
            }
        }

        if (isset($params->memberTask)) {
            $order=1;
            foreach ($params->memberTask as $mtasks) {
                $membertasks = new MemberTask();
                $membertasks->setName($mtasks);
                $membertasks->setOrder($order);
                $em->persist($membertasks);
                $data->addMemberTask($membertasks);
                $order++;
            }
        }

        if (isset($params->nGoals)) {
            foreach ($params->nGoals as $ngoals) {
                $goals = $em->getRepository(NGoals::class)->find($ngoals->id);
                $data->addNGoal($goals);
            }
        }

        if (isset($params->nTask)) {
            foreach ($params->nTask as $ntask) {
                $task = $em->getRepository(NTask::class)->find($ntask->id);
                $data->addNTask($task);
            }
        }
        $em->flush();

        return $data;
    }

    /**
     * @Route("/frontend/members/get_member_by_email", name="email_existent", methods={"POST"})
     */

    //Returns true if exist one member with the email contains in the request param
    public function findMemberByEmail(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $email=$request->request->get('email');

        $result = $entityManager->getRepository(Member::class)->getMembersByEmail($email);

        $response=array('exist_email'=> count($result)==1);

        return new JsonResponse($response, 200);

    }
}
