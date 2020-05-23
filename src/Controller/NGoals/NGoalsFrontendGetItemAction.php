<?php

namespace App\Controller\NGoals;

use App\Entity\NGoals;
use App\Entity\NGoalsTranslation;
use App\Repository\NGoalsTranslationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NGoalsFrontendGetItemAction
 * @package App\Controller\NGoals
 */
class NGoalsFrontendGetItemAction
{
    /**
     * @param Request $request
     * @param NGoalsTranslationRepository $ngoalsTranslationRepository
     * @return NGoals
     */
    public function __invoke(Request $request, NGoalsTranslationRepository $ngoalsTranslationRepository): NGoals
    {
        /** @var NGoalsTranslation $ngoalsTranslation */
        $ngoalsTranslation = $ngoalsTranslationRepository->findOneBy(['slug' => $request->get('slug')]);

        if (!$ngoalsTranslation) {
            throw new NotFoundHttpException();
        }

        return $ngoalsTranslation->getTranslatable();
    }
}
