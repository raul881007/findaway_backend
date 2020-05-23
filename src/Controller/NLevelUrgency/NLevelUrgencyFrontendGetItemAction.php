<?php

namespace App\Controller\NLevelUrgency;

use App\Entity\NLevelUrgency;
use App\Entity\NLevelUrgencyTranslation;
use App\Repository\NLevelUrgencyTranslationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NLevelUrgencyFrontendGetItemAction
 * @package App\Controller\NLevelUrgency
 */
class NLevelUrgencyFrontendGetItemAction
{
    /**
     * @param Request $request
     * @param NLevelUrgencyTranslationRepository $nlevelUrgencyTranslationRepository
     * @return NLevelUrgency
     */
    public function __invoke(Request $request, NLevelUrgencyTranslationRepository $nlevelUrgencyTranslationRepository): NLevelUrgency
    {
        /** @var NLevelUrgencyTranslation $nlevelUrgencyTranslation */
        $nlevelUrgencyTranslation = $nlevelUrgencyTranslationRepository->findOneBy(['slug' => $request->get('slug')]);

        if (!$nlevelUrgencyTranslation) {
            throw new NotFoundHttpException();
        }

        return $nlevelUrgencyTranslation->getTranslatable();
    }
}
