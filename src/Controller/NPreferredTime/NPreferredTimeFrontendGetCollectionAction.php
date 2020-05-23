<?php

namespace App\Controller\NPreferredTime;

use App\Repository\NPreferredTimeRepository;

/**
 * Class NPreferredTimeFrontendGetCollectionAction
 * @package App\Controller
 */
final class NPreferredTimeFrontendGetCollectionAction
{
    /**
     * @param NPreferredTimeRepository $npreferredTimeRepository
     * @return array
     */
    public function __invoke(NPreferredTimeRepository $npreferredTimeRepository): array
    {
        return $npreferredTimeRepository->getNPreferredTime();
    }
}
