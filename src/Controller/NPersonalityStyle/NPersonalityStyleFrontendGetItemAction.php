<?php

namespace App\Controller\NPersonalityStyle;

use App\Entity\NPersonalityStyle;
use App\Entity\NPersonalityStyleTranslation;
use App\Repository\NPersonalityStyleTranslationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NPersonalityStyleFrontendGetItemAction
 * @package App\Controller\NPersonalityStyle
 */
class NPersonalityStyleFrontendGetItemAction
{
    /**
     * @param Request $request
     * @param NPersonalityStyleTranslationRepository $npersonalityStyleTranslationRepository
     * @return NPersonalityStyle
     */
    public function __invoke(Request $request, NPersonalityStyleTranslationRepository $npersonalityStyleTranslationRepository): NPersonalityStyle
    {
        /** @var NPersonalityStyleTranslation $npersonalityStyleTranslation */
        $npersonalityStyleTranslation = $npersonalityStyleTranslationRepository->findOneBy(['slug' => $request->get('slug')]);

        if (!$npersonalityStyleTranslation) {
            throw new NotFoundHttpException();
        }

        return $npersonalityStyleTranslation->getTranslatable();
    }
}
