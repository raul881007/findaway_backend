<?php

namespace App\Controller\NCompliment;

use App\Repository\NComplimentRepository;

/**
 * Class NComplimentFrontendGetCollectionAction
 * @package App\Controller
 */
final class NComplimentFrontendGetCollectionAction
{
    /**
     * @param NComplimentRepository $ncomplimentRepository
     * @return array
     */
    public function __invoke(NComplimentRepository $ncomplimentRepository): array
    {
        return $ncomplimentRepository->getNCompliment();
    }
}
