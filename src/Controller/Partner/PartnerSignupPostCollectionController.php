<?php

namespace App\Controller\Partner;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Partner;
use App\Entity\Language;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Class PartnerSignupPostCollectionController
 * @package App\Controller\User
 */
class PartnerSignupPostCollectionController extends BaseUserController
{
    /**
     * @param Request $request
     * @param Partner $data
     * @param ValidatorInterface $validator
     * @param \Swift_Mailer $mailer
     * @param ParameterBagInterface $params
     * @param EntityManagerInterface $em
     * @param LoggerInterface $logger
     * @return Partner
     * @throws \Exception
     */
    public function __invoke(
        Request $request,
        Partner $data,
        ValidatorInterface $validator,
        \Swift_Mailer $mailer,
        ParameterBagInterface $params,
        LoggerInterface $logger,
        EntityManagerInterface $em
    ): Partner {
        $data->setToken(\bin2hex(\random_bytes(32)));
        $data->setTokenCreatedAt(new \DateTime());

        /** @var Partner $data */
        $data = $this->encodePassword($data);
        $paramsRequest = json_decode($request->getContent());
        $language = $em->getRepository(Language::class)->findOneBy(['code' => $paramsRequest->language]);
        $data->setLanguage($language);
        $validator->validate($data, ['groups' => 'signup']);
        $em->flush();

        try {
            $message = (new \Swift_Message())
                ->setSubject('Confirm registration')
                ->setFrom('admin@joinfindaway.com')
                ->setTo($data->getEmail())
                ->setBody(
                    $this->renderView(
                        'emails/signup.html.twig',
                        [
                            'user' => $data,
                            'url' => sprintf('%s%s%s', $params->get('client_url'), '/token/partner/login/', $data->getToken()),
                        ]
                    ),
                    'text/html'
                );
            $mailer->send($message);
        } catch (\Exception $e) {}

        $url = sprintf('%s%s%s', $params->get('client_url'), '/token/partner/login/', $data->getToken());
        $logger->info('Entra a ' .$url);

        return $data;
    }
}
