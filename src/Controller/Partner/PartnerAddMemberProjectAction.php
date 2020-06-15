<?php

namespace App\Controller\Partner;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Member;
use App\Entity\Partner;
use App\Entity\MemberProjects;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Class PartnerAddMemberProjectAction
 * @package App\Controller\User
 */
class PartnerAddMemberProjectAction extends BaseUserController
{
    /**
     * @param UserInterface $member
     * @param MemberProjects $data
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Member
     */
    public function __invoke(
        MemberProjects $data,
        Request $request,
        UserInterface $partner,
        EntityManagerInterface $em

    ): MemberProjects {
        $params = json_decode($request->getContent());

        if ($data instanceof MemberProjects) {
            if (isset($params->name)) {
                $data->setName($params->name);
            }
            if (isset($params->order)) {	
                $data->setOrderProject($params->order);
            }
            if (isset($params->iscomplete)) {
                $data->setIsCompleted($params->iscomplete);
            }
            if (isset($params->isarchieved)) {
                $data->setIsArchieved($params->isarchieved);
            }
            if (isset($params->idMember)) {
	            $member = $em->getRepository(Member::class)->find($params->idMember);
                $data->setMember($member);
            }
             if ($partner instanceof Partner) {
            	$data->setPartner($partner);
        	}
            
            $em->persist($data);
            $em->flush();
        }

        return $data;
    }
}
