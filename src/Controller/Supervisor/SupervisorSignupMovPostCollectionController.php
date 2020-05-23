<?php

namespace App\Controller\Supervisor;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Supervisor;
use App\Entity\Language;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Class SupervisorSignupMovPostCollectionController
 * @package App\Controller\User
 */
class SupervisorSignupMovPostCollectionController extends BaseUserController
{
    /**
     * @param Request $request
     * @param Supervisor $data
     * @param ValidatorInterface $validator
     * @param ParameterBagInterface $params
     * @param EntityManagerInterface $em
     * @return Supervisor
     * @throws \Exception
     */
    public function __invoke(
        Request $request,
        Supervisor $data,
        ValidatorInterface $validator,
        ParameterBagInterface $params,
        EntityManagerInterface $em
    ): Supervisor {
        $data->setToken(\bin2hex(\random_bytes(32)));
        $data->setTokenCreatedAt(new \DateTime());

        /** @var Supervisor $data */
        $data = $this->encodePassword($data);
        $params = json_decode($request->getContent());
        $language = $em->getRepository(Language::class)->findOneBy(['code' => $params->language]);
        $data->setLanguage($language);
        $validator->validate($data, ['groups' => 'signup']);
        $em->flush();

        return $data;
    }
}
