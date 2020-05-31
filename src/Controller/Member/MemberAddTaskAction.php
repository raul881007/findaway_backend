<?php

namespace App\Controller\Member;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Member;
use App\Entity\MemberTask;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Class MemberAddTaskAction
 * @package App\Controller\User
 */
class MemberAddTaskAction extends BaseUserController
{
    /**
     * @param UserInterface $member
     * @param MemberTask $data
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Member
     */
    public function __invoke(
        MemberTask $data,
        Request $request,
        UserInterface $member,
        EntityManagerInterface $em

    ): Member {
        $params = json_decode($request->getContent());

        if ($data instanceof MemberTask) {
            if (isset($params->name)) {
                $data->setName($params->name);
            }
            if (isset($params->order)) {
                $data->setOrderTask($params->order);
            }
            if (isset($params->iscomplete)) {
                $data->setIsCompleted($params->iscomplete);
            }
             if ($member instanceof Member) {
            	$data->setMember($member);
        	}
            
            $em->persist($data);
            $em->flush();
        }

        return $member;
    }
}
