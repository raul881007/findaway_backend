<?php

namespace App\Controller\Member;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\MemberTask;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class MemberPutTaskAction
 * @package App\Controller\User
 */
class MemberPutTaskAction extends BaseUserController
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
        
       
        $task = $em->getRepository(MemberTask::class)->find($params->id);
        if($params->entityAttribute == 'order'){
        $task->setOrderTask($params->order);
        }
        if($params->entityAttribute == 'archieved'){
        $task->setIsArchieved($params->archieved);
        }
        if($params->entityAttribute == 'completed'){
        $task->setIsCompleted($params->completed);
        }
		$em->flush();

        return new JsonResponse(null, Response::HTTP_ACCEPTED);
    }
}
