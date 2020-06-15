<?php

namespace App\Controller\Partner;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Controller\User\BaseUserController;
use App\Entity\Member;
use App\Entity\Partner;
use App\Entity\MemberTask;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Class PartnerAddMemberTaskAction
 * @package App\Controller\User
 */
class PartnerAddMemberTaskAction extends BaseUserController
{
    /**
     * @param UserInterface $partner
     * @param MemberTask $data
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return MemberTask
     */
    public function __invoke(
        MemberTask $data,
        Request $request,
        UserInterface $partner,
        EntityManagerInterface $em

    ): MemberTask {
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
