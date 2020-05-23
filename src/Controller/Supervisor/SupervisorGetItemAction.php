<?php

namespace App\Controller\Supervisor;

use App\Entity\Supervisor;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class SupervisorGetItemAction
 * @package App\Controller\User
 */
class SupervisorGetItemAction
{
    /**
     * @param UserInterface $supervisor
     * @return Supervisor|null
     */
    public function __invoke(UserInterface $supervisor): ?Supervisor
    {
        if ($supervisor instanceof Supervisor) {
            return $supervisor;
        }

        return null;
    }
}
