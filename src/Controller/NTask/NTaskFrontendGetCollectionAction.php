<?php

namespace App\Controller\NTask;

use App\Repository\NTaskRepository;

/**
 * Class NTaskFrontendGetCollectionAction
 * @package App\Controller
 */
final class NTaskFrontendGetCollectionAction
{
    /**
     * @param NTaskRepository $ntaskRepository
     * @return array
     */
    public function __invoke(NTaskRepository $ntaskRepository): array
    {
        return $ntaskRepository->getNTask();
    }
}
