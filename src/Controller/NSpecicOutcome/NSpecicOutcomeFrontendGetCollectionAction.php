<?php

namespace App\Controller\NSpecicOutcome;

use App\Repository\NSpecicOutcomeRepository;

/**
 * Class NSpecicOutcomeFrontendGetCollectionAction
 * @package App\Controller
 */
final class NSpecicOutcomeFrontendGetCollectionAction
{
    /**
     * @param NSpecicOutcomeRepository $nspecicOutcomeRepository
     * @return array
     */
    public function __invoke(NSpecicOutcomeRepository $nspecicOutcomeRepository): array
    {
        return $nspecicOutcomeRepository->getNSpecicOutcome();
    }
}
