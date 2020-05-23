<?php

namespace App\Controller\Member;

use App\Entity\Member;
use App\Repository\MemberRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationSuccessResponse;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class MemberLoginByTokenCollectionAction
 * @package App\Controller\User
 */
class MemberLoginByTokenCollectionAction
{
    /**
     * @param Request $request
     * @param AuthenticationSuccessHandler $authenticationSuccessHandler
     * @param MemberRepository $memberRepository
     * @return JWTAuthenticationSuccessResponse
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function __invoke(
        Request $request,
        AuthenticationSuccessHandler $authenticationSuccessHandler,
        MemberRepository $memberRepository
    ): JWTAuthenticationSuccessResponse {
        /** @var Member $member */
        $member = $memberRepository->findByToken($request->get('token'));

        if (!$member) {
            throw new NotFoundHttpException();
        }

        return $authenticationSuccessHandler->handleAuthenticationSuccess($member);
    }
}
