<?php

namespace App\Controller\Member;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\MemberGoals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class MemberPutGoalAction
 * @package App\Controller\User
 */
class MemberPutGoalAction extends BaseUserController
{
    /**
     * @param UserInterface $data
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function __invoke(
        UserInterface $data,
        Request $request,
        ValidatorInterface $validator,
        EntityManagerInterface $em

    ): JsonResponse {
        $params = json_decode($request->getContent());
        
         
        $goal = $em->getRepository(MemberGoals::class)->find($params->id);
        if($params->entityAttribute == 'order'){
        $goal->setOrderGoal($params->order);
        }
        if($params->entityAttribute == 'archieved'){
        $goal->setIsArchieved($params->archieved);
        }
        if($params->entityAttribute == 'completed'){
        $goal->setIsCompleted($params->completed);
        }
		$em->flush();
        

        return new JsonResponse(null, Response::HTTP_ACCEPTED);
    }
}
