<?php

namespace App\DataFixtures;

use App\Entity\NCompliment;
use App\Entity\NComplimentTranslation;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ComplimentFixtures
 * @package App\DataFixtures
 */
class ComplimentFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $goals = array(
            0 => [
                'en' => 'Excellent service',
                'es' => 'Excelente servicio'
            ],
            1 => [
                'en' => 'Proactive questions',
                'es' => 'Preguntas proactivas'
            ],
            2 => [
                'en' => 'Great conversations',
                'es' => 'Grandes conversaciones'
            ],
            3 => [
                'en' => 'Active listener',
                'es' => 'Oyente activo'
            ]
        );

        /*$goals = [
            'Excellent service',
            'Proactive questions',
            'Great conversations',
            'Active listener'
        ];*/


        $language1 = $manager->getRepository(Language::class)->find(1);
        $language2 = $manager->getRepository(Language::class)->find(2);
        foreach ($goals as $goalsName) {
            $module = new NCompliment();
            $manager->persist($module);
            foreach ($goalsName as $k => $name){
                $moduleTrans = new NComplimentTranslation();
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
