<?php

namespace App\Controller\Member;

use ApiPlatform\Core\Bridge\Symfony\Validator\Exception\ValidationException;
use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Member;
use App\Repository\MemberRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * Class MemberRemindPasswordCollectionController
 * @package App\Controller\User
 */
class MemberRemindPasswordCollectionController extends BaseUserController
{
    /**
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param \Swift_Mailer $mailer
     * @param ParameterBagInterface $params
     * @param ValidatorInterface $validator
     * @param MemberRepository $memberRepository
     * @return Member
     * @throws \Exception
     */
    public function __invoke(
        Request $request,
        EntityManagerInterface $em,
        \Swift_Mailer $mailer,
        ParameterBagInterface $params,
        ValidatorInterface $validator,
        MemberRepository $memberRepository
    ): Member {
        $data = json_decode($request->getContent(), true);

        $member = null;

        if (isset($data['username'])) {
            /** @var Member $member */
            $member = $memberRepository->getMemberByEmail($data['username']);
        }

        if (!$member) {
            throw new ValidationException(
                new ConstraintViolationList([
                    new ConstraintViolation('User not found', '', [], '', 'username', 'invalid'),
                ])
            );
        }

        $member->setToken(\bin2hex(\random_bytes(32)));
        $member->setTokenCreatedAt(new \DateTime());

        $member = $this->encodePassword($member);

        $validator->validate($member);
        $em->flush();

        try {
            $message = (new \Swift_Message())
                ->setSubject('Remind password')
                ->setFrom('admin@joinfindaway.com')
                ->setTo($member->getUsername())
                ->setBody(
                    $this->renderView(
                        'emails/signup.html.twig',
                        [
                            'user' => $member,
                            'url' => sprintf('%s%s%s', $params->get('client_url'), '/token/member/login/', $member->getToken()),
                        ]
                    ),
                    'text/html'
                );

            $mailer->send($message);
        } catch (\Exception $e) {}

        return $member;
    }
}
