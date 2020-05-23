<?php

namespace App\Controller\NTask;

use App\Entity\NTask;
use App\Entity\NTaskTranslation;
use App\Repository\NTaskTranslationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class NTaskFrontendGetItemAction
 * @package App\Controller\NTask
 */
class NTaskFrontendGetItemAction
{
    /**
     * @param Request $request
     * @param NTaskTranslationRepository $ntaskTranslationRepository
     * @return NTask
     */
    public function __invoke(Request $request, NTaskTranslationRepository $ntaskTranslationRepository): NTask
    {
        /** @var NTaskTranslation $ntaskTranslation */
        $ntaskTranslation = $ntaskTranslationRepository->findOneBy(['slug' => $request->get('slug')]);

        if (!$ntaskTranslation) {
            throw new NotFoundHttpException();
        }

        return $ntaskTranslation->getTranslatable();
    }
}
