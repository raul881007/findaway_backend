<?php

namespace App\Controller\Partner;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\UserConversations;
use App\Entity\UserMesages;
use App\Entity\Member;
use App\Entity\Partner;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Class PartnerAddMemberMessageAction
 * @package App\Controller\User
 */
class PartnerAddMemberMessageAction extends BaseUserController
{
    /**
     * @param UserInterface $partner
     * @param UserMesages $data
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return UserMesage
     */
    public function __invoke(
        UserMesages $data,
        Request $request,
        UserInterface $partner,
        EntityManagerInterface $em

    ): UserMesages {
        $params = json_decode($request->getContent());

        if ($data instanceof UserMesages) {
            $member = $em->getRepository(Member::class)->find($params->idMember);
            if (isset($params->idConversation)) {
	            $conversation = $em->getRepository(UserConversations::class)->find($params->idConversation);
                $data->setUserConversation($conversation);
                $data->setText($params->userMessage);
            }else{
            	$conversation = new UserConversations();
            	$conversation->setPartner($partner);
            	$conversation->setMember($member);
	        	$em->persist($conversation);  
	        	$data->setUserConversation($conversation);
                $data->setText($params->userMessage);       	
            }
        	$em->persist($data);
            $em->flush();
        }

        return $data;
    }
}
