<?php

namespace App\DataFixtures;

use App\Entity\NPersonalityStyle;
use App\Entity\NPersonalityStyleTranslation;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class PersonalityStyleFixtures
 * @package App\DataFixtures
 */
class PersonalityStyleFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $goals = array(
            0 => [
                'en' => 'More assertive',
                'es' => 'Más asertivo'
            ],
            1 => [
                'en' => 'More nurturing',
                'es' => 'Más cariñoso'
            ],
            2 => [
                'en' => 'A balance of both',
                'es' => 'Un equilibrio de ambos'
            ]
        );

        /*$goals = [
            'More assertive',
            'More nurturing',
            'A balance of both'
        ];*/


        $language1 = $manager->getRepository(Language::class)->find(1);
        $language2 = $manager->getRepository(Language::class)->find(2);
        foreach ($goals as $goalsName) {
            $module = new NPersonalityStyle();
            $manager->persist($module);
            foreach ($goalsName as $k => $name){
                $moduleTrans = new NPersonalityStyleTranslation();
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
