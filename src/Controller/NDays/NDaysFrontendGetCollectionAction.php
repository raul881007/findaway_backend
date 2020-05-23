<?php

namespace App\Controller\NDays;

use App\Repository\NDaysRepository;

/**
 * Class NDaysFrontendGetCollectionAction
 * @package App\Controller
 */
final class NDaysFrontendGetCollectionAction
{
    /**
     * @param NDaysRepository $ndaysRepository
     * @return array
     */
    public function __invoke(NDaysRepository $ndaysRepository): array
    {
        return $ndaysRepository->getNDays();
    }
}
