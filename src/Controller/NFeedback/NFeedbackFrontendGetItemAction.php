<?php

namespace App\Controller\NFeedback;

use App\Entity\NFeedback;
use App\Entity\NFeedbackTranslation;
use App\Repository\NFeedbackTranslationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NFeedbackFrontendGetItemAction
 * @package App\Controller\NFeedback
 */
class NFeedbackFrontendGetItemAction
{
    /**
     * @param Request $request
     * @param NFeedbackTranslationRepository $nfeedbackTranslationRepository
     * @return NFeedback
     */
    public function __invoke(Request $request, NFeedbackTranslationRepository $nfeedbackTranslationRepository): NFeedback
    {
        /** @var NFeedbackTranslation $nfeedbackTranslation */
        $nfeedbackTranslation = $nfeedbackTranslationRepository->findOneBy(['slug' => $request->get('slug')]);

        if (!$nfeedbackTranslation) {
            throw new NotFoundHttpException();
        }

        return $nfeedbackTranslation->getTranslatable();
    }
}
