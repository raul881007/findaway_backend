<?php

namespace App\Controller\Supervisor;

use App\Entity\Supervisor;
use App\Repository\SupervisorRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationSuccessResponse;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class SupervisorLoginByTokenCollectionAction
 * @package App\Controller\User
 */
class SupervisorLoginByTokenCollectionAction
{
    /**
     * @param Request $request
     * @param AuthenticationSuccessHandler $authenticationSuccessHandler
     * @param SupervisorRepository $supervisorRepository
     * @return JWTAuthenticationSuccessResponse
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function __invoke(
        Request $request,
        AuthenticationSuccessHandler $authenticationSuccessHandler,
        SupervisorRepository $supervisorRepository
    ): JWTAuthenticationSuccessResponse {
        /** @var Supervisor $supervisor */
        $supervisor = $supervisorRepository->findByToken($request->get('token'));

        if (!$supervisor) {
            throw new NotFoundHttpException();
        }

        return $authenticationSuccessHandler->handleAuthenticationSuccess($supervisor);
    }
}
