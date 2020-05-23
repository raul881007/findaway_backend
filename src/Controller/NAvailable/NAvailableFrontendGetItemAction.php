<?php

namespace App\Controller\NAvailable;

use App\Entity\NAvailable;
use App\Entity\NAvailableTranslation;
use App\Repository\NAvailableTranslationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NAvailableFrontendGetItemAction
 * @package App\Controller\NAvailable
 */
class NAvailableFrontendGetItemAction
{
    /**
     * @param Request $request
     * @param NAvailableTranslationRepository $navailableTranslationRepository
     * @return NAvailable
     */
    public function __invoke(Request $request, NAvailableTranslationRepository $navailableTranslationRepository): NAvailable
    {
        /** @var NAvailableTranslation $navailableTranslation */
        $navailableTranslation = $navailableTranslationRepository->findOneBy(['slug' => $request->get('slug')]);

        if (!$navailableTranslation) {
            throw new NotFoundHttpException();
        }

        return $navailableTranslation->getTranslatable();
    }
}
