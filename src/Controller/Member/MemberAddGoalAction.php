<?php

namespace App\Controller\Member;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Member;
use App\Entity\MemberGoals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Class MemberAddGoalAction
 * @package App\Controller\User
 */
class MemberAddGoalAction extends BaseUserController
{
    /**
     * @param UserInterface $member
     * @param MemberGoals $data
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Member
     */
    public function __invoke(
        MemberGoals $data,
        Request $request,
        UserInterface $member,
        EntityManagerInterface $em

    ): MemberGoals {
        $params = json_decode($request->getContent());

        if ($data instanceof MemberGoals) {
            if (isset($params->name)) {
                $data->setName($params->name);
            }
            if (isset($params->order)) {
                $data->setOrderGoal($params->order);
            }
            if (isset($params->iscomplete)) {
                $data->setIsCompleted($params->iscomplete);
            }
            if (isset($params->isarchieved)) {
                $data->setIsArchieved($params->isarchieved);
            }
             if ($member instanceof Member) {
            	$data->setMember($member);
        	}
            
            $em->persist($data);
            $em->flush();
        }

        return $data;
    }
}
