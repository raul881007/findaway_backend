<?php

namespace App\DataFixtures;

use App\Entity\NDays;
use App\Entity\NDaysTranslation;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class DaysFixtures
 * @package App\DataFixtures
 */
class DaysFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $goals = array(
            0 => [
                'en' => 'Monday',
                'es' => 'Lunes'
            ],
            1 => [
                'en' => 'Tuesday',
                'es' => 'Martes'
            ],
            2 => [
                'en' => 'Wednesday',
                'es' => 'Miércoles'
            ],
            3 => [
                'en' => 'Thursday',
                'es' => 'Jueves'
            ],
            4 => [
                'en' => 'Friday',
                'es' => 'Viernes'
            ],
            5 => [
                'en' => 'Saturday',
                'es' => 'Sábado'
            ],
            6 => [
                'en' => 'Sunday',
                'es' => 'Domingo'
            ]
        );


        /*$goals = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ];*/

        $language1 = $manager->getRepository(Language::class)->find(1);
        $language2 = $manager->getRepository(Language::class)->find(2);
        foreach ($goals as $goalsName) {
            $module = new NDays();
            $manager->persist($module);
            foreach ($goalsName as $k => $name){
                $moduleTrans = new NDaysTranslation();
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
