<?php

namespace App\Controller\Partner;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Partner;
use App\Entity\Ratings;
use App\Entity\Language;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class PartnerActionController
 * @package App\Controller\User
 */
class PartnerActionController extends BaseUserController
{
   
    /**
     * @Route("/frontend/partner/sendNotification", name="partners_send_notification", methods={"POST"})

     */
    //Funtion to send a notification to a member
    
    public function sendMemberNotification(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        
        $response = $entityManager->getRepository(Partner::class)->findAllArray();
        
        
        $user = $this->getUser();
        $user_id = $this->getUser()->getId();
        var_dump($user_id);
        die;
        $member_id=$request->request->get('id_member');
        $notificationText=$request->request->get('notification_text');
        $member=$entityManager->getRepository(Member::class)->findById($id_member);
        
        $notification = new MemberNotifications();
        $notification->setPartner($user);
        $notification->setMember($member);
        $notification->setNote($notificationText);
      	$entityManager->persist($notification);
        $entityManager->flush();

        return new JsonResponse(true, 200);

    }
}
