<?php

namespace App\Controller\Languages;

use App\Entity\Language;
use App\Repository\LanguageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class LanguagesFrontendGetCollectionAction
 * @package App\Controller
 */
final class LanguagesFrontendGetCollectionAction
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * TaskDeadlineAction constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $repository = $this->em->getRepository(Language::class);
        return $repository->getLanguages();
    }
}
