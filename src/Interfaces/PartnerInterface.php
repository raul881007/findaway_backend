<?php

namespace App\Interfaces;

use App\Entity\Partner;

/**
 * Interface PartnerInterface
 * @package App\Interfaces
 */
interface PartnerInterface
{
    /**
     * @return Partner
     */
    public function getPartner(): ?Partner;
}
