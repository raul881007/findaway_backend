<?php

namespace App\Controller\Partner;

use App\Entity\Partner;
use App\Repository\PartnerRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationSuccessResponse;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PartnerLoginByTokenCollectionAction
 * @package App\Controller\User
 */
class PartnerLoginByTokenCollectionAction
{
    /**
     * @param Request $request
     * @param AuthenticationSuccessHandler $authenticationSuccessHandler
     * @param PartnerRepository $partnerRepository
     * @return JWTAuthenticationSuccessResponse
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function __invoke(
        Request $request,
        AuthenticationSuccessHandler $authenticationSuccessHandler,
        PartnerRepository $partnerRepository
    ): JWTAuthenticationSuccessResponse {
        /** @var Partner $partner */
        $partner = $partnerRepository->findByToken($request->get('token'));

        if (!$partner) {
            throw new NotFoundHttpException();
        }

        return $authenticationSuccessHandler->handleAuthenticationSuccess($partner);
    }
}
