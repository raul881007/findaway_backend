<?php

namespace App\DataFixtures;

use App\Entity\NFeedback;
use App\Entity\NFeedbackTranslation;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class FeedbackFixtures
 * @package App\DataFixtures
 */
class FeedbackFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $goals = array(
            0 => [
                'en' => 'Notes',
                'es' => 'Notas'
            ],
            1 => [
                'en' => 'Punctuality',
                'es' => 'Puntualidad'
            ],
            2 => [
                'en' => 'Professionalism',
                'es' => 'Profesionalismo'
            ],
            3 => [
                'en' => 'Consistency',
                'es' => 'Consistencia'
            ],
            4 => [
                'en' => 'Questions',
                'es' => 'Preguntas'
            ],
            5 => [
                'en' => 'Eort',
                'es' => 'Eort'
            ],
            6 => [
                'en' => 'Call durations',
                'es' => 'Duración de las llamadas'
            ]
        );

        /*$goals = [
            'Notes',
            'Punctuality',
            'Professionalism',
            'Consistency',
            'Questions',
            'Eort',
            'Call durations'
        ];*/

        $language1 = $manager->getRepository(Language::class)->find(1);
        $language2 = $manager->getRepository(Language::class)->find(2);
        foreach ($goals as $goalsName) {
            $module = new NFeedback();
            $manager->persist($module);
            foreach ($goalsName as $k => $name){
                $moduleTrans = new NFeedbackTranslation();
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
