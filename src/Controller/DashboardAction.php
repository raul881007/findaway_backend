<?php

namespace App\Controller;

use App\Entity\Member;
use App\Entity\Partner;
// use App\Entity\Task;
use App\Entity\User;
use App\Repository\MemberRepository;
use App\Repository\PartnerRepository;
// use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DashboardAction
 * @package App\Controller
 */
final class DashboardAction
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * EventDeadlineAction constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        /** @var MemberRepository $repository */
        $memberRepository = $this->em->getRepository(Member::class);

        /** @var PartnerRepository $repository */
        $partnerRepository = $this->em->getRepository(Partner::class);

        /** @var TaskRepository $repository */
        // $eventRepository = $this->em->getRepository(Task::class);

        return [
            [
                'member_30' => $memberRepository->getSummaryNew(30),
                'partner_30' => $partnerRepository->getSummaryNew(30),
                /*'user_7' => $userRepository->getSummary(7),
                'user_30' => $userRepository->getSummary(30),
                'user_365' => $userRepository->getSummary(365),
                'user_time_7' => $userRepository->getTimeSummary(7),
                'user_time_30' => $userRepository->getTimeSummary(30),
                'user_time_365' => $userRepository->getTimeSummary(365),
                'clients_30' => $memberRepository->getSummaryNew(30),
                'events_30' => $eventRepository->getSummary(30),*/
            ]
        ];
    }
}
