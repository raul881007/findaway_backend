<?php

namespace App\Controller\Supervisor;

use ApiPlatform\Core\Bridge\Symfony\Validator\Exception\ValidationException;
use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Supervisor;
use App\Repository\SupervisorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * Class SupervisorRemindPasswordCollectionController
 * @package App\Controller\User
 */
class SupervisorRemindPasswordCollectionController extends BaseUserController
{
    /**
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param \Swift_Mailer $mailer
     * @param ParameterBagInterface $params
     * @param ValidatorInterface $validator
     * @param SupervisorRepository $supervisorRepository
     * @return Supervisor
     * @throws \Exception
     */
    public function __invoke(
        Request $request,
        EntityManagerInterface $em,
        \Swift_Mailer $mailer,
        ParameterBagInterface $params,
        ValidatorInterface $validator,
        SupervisorRepository $supervisorRepository
    ): Supervisor {
        $data = json_decode($request->getContent(), true);

        $supervisor = null;

        if (isset($data['username'])) {
            /** @var Supervisor $supervisor */
            $supervisor = $supervisorRepository->getSupervisorByEmail($data['username']);
        }

        if (!$supervisor) {
            throw new ValidationException(
                new ConstraintViolationList([
                    new ConstraintViolation('User not found', '', [], '', 'username', 'invalid'),
                ])
            );
        }

        $supervisor->setToken(\bin2hex(\random_bytes(32)));
        $supervisor->setTokenCreatedAt(new \DateTime());

        $supervisor = $this->encodePassword($supervisor);

        $validator->validate($supervisor);
        $em->flush();

        try {
            $message = (new \Swift_Message())
                ->setSubject('Remind password')
                ->setFrom('admin@joinfindaway.com')
                ->setTo($supervisor->getUsername())
                ->setBody(
                    $this->renderView(
                        'emails/signup.html.twig',
                        [
                            'user' => $supervisor,
                            'url' => sprintf('%s%s%s', $params->get('client_url'), '/token/supervisor/login/', $supervisor->getToken()),
                        ]
                    ),
                    'text/html'
                );

            $mailer->send($message);
        } catch (\Exception $e) {}

        return $supervisor;
    }
}
