<?php

namespace App\Controller\Member;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Member;
use App\Entity\MemberGoals;
use App\Entity\MemberTask;
use App\Entity\NGoals;
use App\Entity\NTask;
use App\Entity\Language;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class MemberSignupMovPostCollectionController
 * @package App\Controller\User
 */
class MemberActionController extends BaseUserController
{
   

    /**
     * @Route("/frontend/members/get_member_notification", name="member_notification", methods={"GET"})
     */

    //Returns all notifications by member
    public function getMemberNotifications()
    {
        $entityManager = $this->getDoctrine()->getManager();
		$user = $this->getUser();
        $user_id = $this->getUser()->getId();
        $result = $entityManager->getRepository(Member::class)->findNotifications($user_id);
     //   $member=$entityManager->getRepository(MemberTask::class)->findById($id_member);
        return new JsonResponse($result, 200);

    }
    
     /**
     * @Route("/frontend/members/insertMemberTask", name="members_insert_task", methods={"POST"})
     */
    //Funtion to insert to a member
    
    public function createMemberTask(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $member = $this->getUser();
        $isFutureTask=$request->request->get('is_future');
        $taskText=$request->request->get('task_text');
        $memberTask = new MemberTask();
        $memberTask->setMember($member);
        $memberTask->setIsFuture($isFutureTask);
        $memberTask->setName($taskText);
      	$entityManager->persist($memberTask);
        $entityManager->flush();

        return new JsonResponse(true, 200);

    }
    
    /**
     * @Route("/frontend/members/insertMemberGoal", name="members_insert_goal", methods={"POST"})

     */
    //Funtion to insert goal to a member
    
    public function createMemberGoal(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $member = $this->getUser();
        $taskText=$request->request->get('task_text');
        $memberGoal = new MemberGoals();
        $memberGoal->setMember($member);
        $memberGoal->setName($taskText);
      	$entityManager->persist($memberGoal);
        $entityManager->flush();

        return new JsonResponse(true, 200);

    }
}
