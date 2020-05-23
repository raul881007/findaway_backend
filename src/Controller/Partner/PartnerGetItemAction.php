<?php

namespace App\Controller\Partner;

use App\Entity\Partner;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class PartnerGetItemAction
 * @package App\Controller\User
 */
class PartnerGetItemAction
{
    /**
     * @param UserInterface $partner
     * @return Partner|null
     */
    public function __invoke(UserInterface $partner): ?Partner
    {
        if ($partner instanceof Partner) {
            return $partner;
        }

        return null;
    }
}
