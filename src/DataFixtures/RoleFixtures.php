<?php

namespace App\DataFixtures;

use App\Entity\Module;
use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class RoleFixtures
 * @package App\DataFixtures
 */
class RoleFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $modules = [
            'Client' => [],
            'Document' => [],
            'File' => [
                'LIST',
                'CREATE',
                'SHOW',
                'UPDATE',
                'DELETE',
                'DOWNLOAD',
            ],
            'N Goals' => [],
            'Group' => [
                'LIST',
//                'CREATE',
                'SHOW',
//                'UPDATE',
//                'DELETE',
            ],
            'History' => [
                'LIST',
            ],
            'Module' => [],
            'Member' => [],
            'Partner' => [],
            'Supervisor' => [],
            'Role' => [],
            'Ratings' => [],
            'Language' => [],
            'N Task' => [],
            'N Available' => [],
            'N Compliment' => [],
            'N Days' => [],
            'N Feedback' => [],
            'N Level Urgency' => [],
            'N Personality Style' => [],
            'N Preferred Time' => [],
            'N Specic Outcome' => [],
            'User' => [
                'LIST',
//                'CREATE',
                'SHOW',
//                'UPDATE',
//                'DELETE',
                'DASHBOARD',
            ],
            'Other' => [
                'SEARCH',
                'CALENDAR',
            ],
//            'Currency' => [],
//            'Company' => [],
//            'Company product' => [],
//            'Image' => [],
//            'Category' => [],
//            'Text' => [],
//            'Invoice header' => [],
//            'Invoice line' => [],
//            'Invoice status' => [],
//            'Invoice type' => [],
//            'Language' => [],
//            'Order header' => [],
//            'Order line' => [],
//            'Order line status' => [],
//            'Order status' => [],
//            'Payment type' => [],
//            'Brand' => [],
//            'Channel' => [],
//            'Product' => [],
//            'Product sell price' => [],
//            'Purchase order header' => [],
//            'Purchase order line' => [],
//            'Purchase order line status' => [],
//            'Purchase order status' => [],
//            'Shipment method' => [],
//            'Shipping notice header' => [],
//            'Shipping notice line' => [],
//            'Shipping notice line status' => [],
//            'Shipping notice status' => [],
//            'Stock line' => [],
//            'Stock line status' => [],
//            'Vat' => [],
//            'Warehouse' => [],
        ];

        $actions = [
            'LIST',
            'CREATE',
            'SHOW',
            'UPDATE',
            'DELETE',
        ];

        foreach ($modules as $moduleName => $_actions) {
            $module = new Module();
            $module->setName($moduleName);
            $manager->persist($module);

            if (empty($_actions)) {
                $_actions = $actions;
            }

            foreach ($_actions as $action) {
                $role = new Role();
                $role->setModule($module);
                $role->setName(ucfirst(strtolower($action)));
                $role->setRole('ROLE_' . strtoupper(str_replace(' ', '_', $module->getName())) . '_' . $action);
                $manager->persist($role);
            }

            $manager->flush();
        }
    }
}
