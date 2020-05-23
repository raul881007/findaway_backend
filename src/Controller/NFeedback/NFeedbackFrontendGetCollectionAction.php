<?php

namespace App\Controller\NFeedback;

use App\Repository\NFeedbackRepository;

/**
 * Class NFeedbackFrontendGetCollectionAction
 * @package App\Controller
 */
final class NFeedbackFrontendGetCollectionAction
{
    /**
     * @param NFeedbackRepository $nfeedbackRepository
     * @return array
     */
    public function __invoke(NFeedbackRepository $nfeedbackRepository): array
    {
        return $nfeedbackRepository->getNFeedback();
    }
}
