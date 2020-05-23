<?php

namespace App\Interfaces;

use App\Entity\Supervisor;

/**
 * Interface SupervisorInterface
 * @package App\Interfaces
 */
interface SupervisorInterface
{
    /**
     * @return Supervisor
     */
    public function getSupervisor(): ?Supervisor;
}
