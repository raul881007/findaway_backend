<?php

namespace App\Controller\Partner;

use ApiPlatform\Core\Bridge\Symfony\Validator\Exception\ValidationException;
use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Partner;
use App\Repository\PartnerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * Class PartnerRemindPasswordCollectionController
 * @package App\Controller\User
 */
class PartnerRemindPasswordCollectionController extends BaseUserController
{
    /**
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param \Swift_Mailer $mailer
     * @param ParameterBagInterface $params
     * @param ValidatorInterface $validator
     * @param PartnerRepository $partnerRepository
     * @return Partner
     * @throws \Exception
     */
    public function __invoke(
        Request $request,
        EntityManagerInterface $em,
        \Swift_Mailer $mailer,
        ParameterBagInterface $params,
        ValidatorInterface $validator,
        PartnerRepository $partnerRepository
    ): Partner {
        $data = json_decode($request->getContent(), true);

        $partner = null;

        if (isset($data['username'])) {
            /** @var Partner $partner */
            $partner = $partnerRepository->getPartnerByEmail($data['username']);
        }

        if (!$partner) {
            throw new ValidationException(
                new ConstraintViolationList([
                    new ConstraintViolation('User not found', '', [], '', 'username', 'invalid'),
                ])
            );
        }

        $partner->setToken(\bin2hex(\random_bytes(32)));
        $partner->setTokenCreatedAt(new \DateTime());

        $partner = $this->encodePassword($partner);

        $validator->validate($partner);
        $em->flush();

        try {
            $message = (new \Swift_Message())
                ->setSubject('Remind password')
                ->setFrom('admin@joinfindaway.com')
                ->setTo($partner->getUsername())
                ->setBody(
                    $this->renderView(
                        'emails/signup.html.twig',
                        [
                            'user' => $partner,
                            'url' => sprintf('%s%s%s', $params->get('client_url'), '/token/partner/login/', $partner->getToken()),
                        ]
                    ),
                    'text/html'
                );

            $mailer->send($message);
        } catch (\Exception $e) {}

        return $partner;
    }
}
