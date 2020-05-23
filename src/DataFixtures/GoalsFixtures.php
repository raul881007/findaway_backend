<?php

namespace App\DataFixtures;

use App\Entity\NGoals;
use App\Entity\NGoalsTranslation;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class GoalsFixtures
 * @package App\DataFixtures
 */
class GoalsFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $goals = array(
            0 => [
                'en' => 'Double my monthly income',
                'es' => 'Duplicar mis ingresos mensuales'
            ],
            1 => [
                'en' => 'Get in the best shape of my life',
                'es' => 'Me pongo en la mejor forma de mi vida'
            ],
            2 => [
                'en' => 'Start my own business',
                'es' => 'Empezar mi propio negocio'
            ],
            3 => [
                'en' => 'Be a leader in my community',
                'es' => 'Ser un líder en mi comunidad'
            ],
            4 => [
                'en' => 'Take a geat vacation',
                'es' => 'Tómate unas vacaciones geniales'
            ],
            5 => [
                'en' => 'Master my craft',
                'es' => 'Domina mi oficio'
            ],
            6 => [
                'en' => 'Loose 20 pounds',
                'es' => 'Suelta 20 libras'
            ],
            7 => [
                'en' => 'Create a system for cold calling',
                'es' => 'Crear un sistema para llamadas en frío'
            ],
            8 => [
                'en' => 'Start a Youtube channel',
                'es' => 'Iniciar un canal de Youtube'
            ],
            9 => [
                'en' => 'Get promoted',
                'es' => 'Ser promovido'
            ],
            10 => [
                'en' => 'Reach 50 customers',
                'es' => 'Llegar a 50 clientes'
            ],
            11 => [
                'en' => 'Loose 10 pounds',
                'es' => 'Suelta 10 libras'
            ]
        );

        /*$goals = [
            'Double my monthly income',
            'Get in the best shape of my life',
            'Start my own business',
            'Be a leader in my community',
            'Take a geat vacation',
            'Master my craft',
            'Loose 20 pounds',
            'Create a system for cold calling',
            'Start a Youtube channel',
            'Get promoted',
            'Reach 50 customers',
            'Loose 10 pounds'
        ];*/

        $language1 = $manager->getRepository(Language::class)->find(1);
        $language2 = $manager->getRepository(Language::class)->find(2);
        foreach ($goals as $goalsName) {
            $module = new NGoals();
            $manager->persist($module);
            foreach ($goalsName as $k => $name){
                $moduleTrans = new NGoalsTranslation();
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
