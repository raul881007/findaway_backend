<?php

namespace App\DataFixtures;

use App\Entity\NSpecicOutcome;
use App\Entity\NSpecicOutcomeTranslation;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class SpecicOutcomeFixtures
 * @package App\DataFixtures
 */
class SpecicOutcomeFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $goals = array(
            0 => [
                'en' => 'Develop habit',
                'es' => 'Desarrollar hábito'
            ],
            1 => [
                'en' => 'Accomplish a goal',
                'es' => 'Alcanzar un objetivo'
            ]
        );

        /*$goals = [
            'Develop habit',
            'Accomplish a goal'
        ];*/

        $language1 = $manager->getRepository(Language::class)->find(1);
        $language2 = $manager->getRepository(Language::class)->find(2);
        foreach ($goals as $goalsName) {
            $module = new NSpecicOutcome();
            $manager->persist($module);
            foreach ($goalsName as $k => $name){
                $moduleTrans = new NSpecicOutcomeTranslation();
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
