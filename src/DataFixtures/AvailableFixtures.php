<?php

namespace App\DataFixtures;

use App\Entity\NAvailable;
use App\Entity\NAvailableTranslation;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class AvailableFixtures
 * @package App\DataFixtures
 */
class AvailableFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $goals = array(
            '0' => [
                'en' => 'Morning',
                'es' => 'Mañana'
            ],
            '1' => [
                'en' => 'Morning and Afternoon',
                'es' => 'Mañana y tarde'
            ],
            '2' => [
                'en' => 'Morning and Evening',
                'es' => 'Mañana y noche'
            ],
            '3' => [
                'en' => 'Afternoon',
                'es' => 'Tarde'
            ],
            '4' => [
                'en' => 'Afternoon and Evening',
                'es' => 'Tarde y noche'
            ],
            '5' => [
                'en' => 'Evening',
                'es' => 'Noche'
            ],
            '6' => [
                'en' => 'All Day',
                'es' => 'Todo el dia'
            ]
        );

        /*$goals = [
            'Morning',
            'Morning and Afternoon',
            'Morning and Evening',
            'Afternoon',
            'Afternoon and Evening',
            'Evening',
            'All Day'
        ];*/

        $language1 = $manager->getRepository(Language::class)->find(1);
        $language2 = $manager->getRepository(Language::class)->find(2);
        foreach ($goals as $goalsName) {
            $module = new NAvailable();
            $manager->persist($module);
            foreach ($goalsName as $k => $name){
                $moduleTrans = new NAvailableTranslation();
                if ($k == 'en'){
                    $moduleTrans->setLanguage($language1);
                }else{
                    $moduleTrans->setLanguage($language2);
                }
                $moduleTrans->setName($name);
                $module->addTranslation($moduleTrans);
                $manager->persist($moduleTrans);
            }
        }
        $manager->flush();

    }
}
