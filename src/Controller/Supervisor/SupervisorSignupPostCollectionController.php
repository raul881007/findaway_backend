<?php

namespace App\Controller\Supervisor;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Supervisor;
use App\Entity\Language;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Class SupervisorSignupPostCollectionController
 * @package App\Controller\User
 */
class SupervisorSignupPostCollectionController extends BaseUserController
{
    /**
     * @param Request $request
     * @param Supervisor $data
     * @param ValidatorInterface $validator
     * @param \Swift_Mailer $mailer
     * @param ParameterBagInterface $params
     * @param EntityManagerInterface $em
     * @return Supervisor
     * @throws \Exception
     */
    public function __invoke(
        Request $request,
        Supervisor $data,
        ValidatorInterface $validator,
        \Swift_Mailer $mailer,
        ParameterBagInterface $params,
        EntityManagerInterface $em
    ): Supervisor {
        $data->setToken(\bin2hex(\random_bytes(32)));
        $data->setTokenCreatedAt(new \DateTime());

        /** @var Supervisor $data */
        $data = $this->encodePassword($data);
        $params = json_decode($request->getContent());
        $language = $em->getRepository(Language::class)->findOneBy(['code' => $params->language]);
        $data->setLanguage($language);
        $validator->validate($data, ['groups' => 'signup']);
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
                            'url' => sprintf('%s%s%s', $params->get('client_url'), '/token/supervisor/login/', $data->getToken()),
                        ]
                    ),
                    'text/html'
                );

            $mailer->send($message);
        } catch (\Exception $e) {}

        return $data;
    }
}
