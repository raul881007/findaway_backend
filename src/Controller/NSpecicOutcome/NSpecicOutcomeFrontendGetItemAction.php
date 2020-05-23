<?php

namespace App\Controller\NSpecicOutcome;

use App\Entity\NSpecicOutcome;
use App\Entity\NSpecicOutcomeTranslation;
use App\Repository\NSpecicOutcomeTranslationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NSpecicOutcomeFrontendGetItemAction
 * @package App\Controller\NSpecicOutcome
 */
class NSpecicOutcomeFrontendGetItemAction
{
    /**
     * @param Request $request
     * @param NSpecicOutcomeTranslationRepository $nspecicOutcomeTranslationRepository
     * @return NSpecicOutcome
     */
    public function __invoke(Request $request, NSpecicOutcomeTranslationRepository $nspecicOutcomeTranslationRepository): NSpecicOutcome
    {
        /** @var NSpecicOutcomeTranslation $nspecicOutcomeTranslation */
        $nspecicOutcomeTranslation = $nspecicOutcomeTranslationRepository->findOneBy(['slug' => $request->get('slug')]);

        if (!$nspecicOutcomeTranslation) {
            throw new NotFoundHttpException();
        }

        return $nspecicOutcomeTranslation->getTranslatable();
    }
}
