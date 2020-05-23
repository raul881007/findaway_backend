<?php

namespace App\Controller\NPersonalityStyle;

use App\Repository\NPersonalityStyleRepository;

/**
 * Class NPersonalityStyleFrontendGetCollectionAction
 * @package App\Controller
 */
final class NPersonalityStyleFrontendGetCollectionAction
{
    /**
     * @param NPersonalityStyleRepository $npersonalityStyleRepository
     * @return array
     */
    public function __invoke(NPersonalityStyleRepository $npersonalityStyleRepository): array
    {
        return $npersonalityStyleRepository->getNPersonalityStyle();
    }
}
