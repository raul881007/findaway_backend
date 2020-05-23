<?php

namespace App\Controller\NGoals;

use App\Repository\NGoalsRepository;

/**
 * Class NGoalsFrontendGetCollectionAction
 * @package App\Controller
 */
final class NGoalsFrontendGetCollectionAction
{
    /**
     * @param NGoalsRepository $ngoalsRepository
     * @return array
     */
    public function __invoke(NGoalsRepository $ngoalsRepository): array
    {
        return $ngoalsRepository->getNGoals();
    }
}
