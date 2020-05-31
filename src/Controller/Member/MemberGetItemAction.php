<?php

namespace App\Controller\Member;

use App\Entity\Member;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class MemberGetItemAction
 * @package App\Controller\User
 */
class MemberGetItemAction
{
    /**
     * @param UserInterface $member
	 * @param EntityManagerInterface $em
     * @return Member|null
     */
    public function __invoke(UserInterface $member): ?Member
    {
        if ($member instanceof Member) {
            return $member;
        }

        return null;
    }
}
