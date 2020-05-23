<?php

namespace App\Interfaces;

use App\Entity\Member;

/**
 * Interface MemberInterface
 * @package App\Interfaces
 */
interface MemberInterface
{
    /**
     * @return Member
     */
    public function getMember(): ?Member;
}
