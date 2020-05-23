<?php

namespace App\Controller\NAvailable;

use App\Repository\NAvailableRepository;

/**
 * Class NAvailableFrontendGetCollectionAction
 * @package App\Controller
 */
final class NAvailableFrontendGetCollectionAction
{
    /**
     * @param NAvailableRepository $navailableRepository
     * @return array
     */
    public function __invoke(NAvailableRepository $navailableRepository): array
    {
        return $navailableRepository->getNAvailable();
    }
}
