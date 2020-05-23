<?php

namespace App\Controller\NPreferredTime;

use App\Entity\NPreferredTime;
use App\Entity\NPreferredTimeTranslation;
use App\Repository\NPreferredTimeTranslationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NPreferredTimeFrontendGetItemAction
 * @package App\Controller\NPreferredTime
 */
class NPreferredTimeFrontendGetItemAction
{
    /**
     * @param Request $request
     * @param NPreferredTimeTranslationRepository $npreferredTimeTranslationRepository
     * @return NPreferredTime
     */
    public function __invoke(Request $request, NPreferredTimeTranslationRepository $npreferredTimeTranslationRepository): NPreferredTime
    {
        /** @var NPreferredTimeTranslation $npreferredTimeTranslation */
        $npreferredTimeTranslation = $npreferredTimeTranslationRepository->findOneBy(['slug' => $request->get('slug')]);

        if (!$npreferredTimeTranslation) {
            throw new NotFoundHttpException();
        }

        return $npreferredTimeTranslation->getTranslatable();
    }
}
