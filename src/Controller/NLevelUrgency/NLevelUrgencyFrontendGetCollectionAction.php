<?php

namespace App\Controller\NLevelUrgency;

use App\Repository\NLevelUrgencyRepository;

/**
 * Class NLevelUrgencyFrontendGetCollectionAction
 * @package App\Controller
 */
final class NLevelUrgencyFrontendGetCollectionAction
{
    /**
     * @param NLevelUrgencyRepository $nlevelUrgencyRepository
     * @return array
     */
    public function __invoke(NLevelUrgencyRepository $nlevelUrgencyRepository): array
    {
        return $nlevelUrgencyRepository->getNLevelUrgency();
    }
}
