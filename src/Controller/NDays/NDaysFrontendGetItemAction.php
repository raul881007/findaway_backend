<?php

namespace App\Controller\NDays;

use App\Entity\NDays;
use App\Entity\NDaysTranslation;
use App\Repository\NDaysTranslationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NDaysFrontendGetItemAction
 * @package App\Controller\NDays
 */
class NDaysFrontendGetItemAction
{
    /**
     * @param Request $request
     * @param NDaysTranslationRepository $ndaysTranslationRepository
     * @return NDays
     */
    public function __invoke(Request $request, NDaysTranslationRepository $ndaysTranslationRepository): NDays
    {
        /** @var NDaysTranslation $ndaysTranslation */
        $ndaysTranslation = $ndaysTranslationRepository->findOneBy(['slug' => $request->get('slug')]);

        if (!$ndaysTranslation) {
            throw new NotFoundHttpException();
        }

        return $ndaysTranslation->getTranslatable();
    }
}
