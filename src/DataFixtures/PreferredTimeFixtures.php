<?php

namespace App\DataFixtures;

use App\Entity\NPreferredTime;
use App\Entity\NPreferredTimeTranslation;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class PreferredTimeFixtures
 * @package App\DataFixtures
 */
class PreferredTimeFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $goals = array(
            0 => [
                'en' => 'Morning',
                'es' => 'Mañana'
            ],
            1 => [
                'en' => 'Afternoon',
                'es' => 'Tarde'
            ],
            2 => [
                'en' => 'Evening',
                'es' => 'Noche'
            ],
            3 => [
                'en' => 'Upon waking up',
                'es' => 'Al despertar'
            ],
            4 => [
                'en' => 'Before bed',
                'es' => 'Antes de ir a la cama'
            ]
        );

        /*$goals = [
            'Morning',
            'Afternoon',
            'Evening',
            'Upon waking up',
            'Before bed'
        ];*/

        $language1 = $manager->getRepository(Language::class)->find(1);
        $language2 = $manager->getRepository(Language::class)->find(2);
        foreach ($goals as $goalsName) {
            $module = new NPreferredTime();
            $manager->persist($module);
            foreach ($goalsName as $k => $name){
                $moduleTrans = new NPreferredTimeTranslation();
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
