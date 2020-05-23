<?php

namespace App\Controller\NCompliment;

use App\Entity\NCompliment;
use App\Entity\NComplimentTranslation;
use App\Repository\NComplimentTranslationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NComplimentFrontendGetItemAction
 * @package App\Controller\NCompliment
 */
class NComplimentFrontendGetItemAction
{
    /**
     * @param Request $request
     * @param NComplimentTranslationRepository $ncomplimentTranslationRepository
     * @return NCompliment
     */
    public function __invoke(Request $request, NComplimentTranslationRepository $ncomplimentTranslationRepository): NCompliment
    {
        /** @var NComplimentTranslation $ncomplimentTranslation */
        $ncomplimentTranslation = $ncomplimentTranslationRepository->findOneBy(['slug' => $request->get('slug')]);

        if (!$ncomplimentTranslation) {
            throw new NotFoundHttpException();
        }

        return $ncomplimentTranslation->getTranslatable();
    }
}
