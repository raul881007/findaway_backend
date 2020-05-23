<?php

namespace App\DataFixtures;

use App\Entity\NLevelUrgency;
use App\Entity\NLevelUrgencyTranslation;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LevelUrgencyFixtures
 * @package App\DataFixtures
 */
class LevelUrgencyFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $goals = array(
            0 => [
                'en' => 'Urgent and important',
                'es' => 'Urgente e importante'
            ],
            1 => [
                'en' => 'Important, Not urgent',
                'es' => 'Importante, no urgente'
            ],
            2 => [
                'en' => 'Urgent, Not important',
                'es' => 'Urgente, no importante'
            ]
        );

        /*$goals = [
            'Urgent and important',
            'Important, Not urgent',
            'Urgent, Not important'
        ];*/

        $language1 = $manager->getRepository(Language::class)->find(1);
        $language2 = $manager->getRepository(Language::class)->find(2);
        foreach ($goals as $goalsName) {
            $module = new NLevelUrgency();
            $manager->persist($module);
            foreach ($goalsName as $k => $name){
                $moduleTrans = new NLevelUrgencyTranslation();
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
