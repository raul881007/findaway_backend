<?php

namespace App\Controller\Member;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\MemberTask;
use App\Entity\Member;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class MemberGetAttributeAction
 * @package App\Controller\User
 */
class MemberGetAttributeAction extends BaseUserController
{
     /**
     * @param UserInterface $member
    * @param Request $request
	 * @param EntityManagerInterface $em
     * @return Member|null
     */
    public function __invoke(UserInterface $member,Request $request): ?Member
    {

	    $params = json_decode($request->getContent());
        if ($params->attributeName == 1) {

            return $member->getMemberProject();
        }

        return null;
    }
}
