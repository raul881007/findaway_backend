<?php

namespace App\DataFixtures;

use App\Entity\NTask;
use App\Entity\NTaskTranslation;
use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class TaskFixtures
 * @package App\DataFixtures
 */
class TaskFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $tasks = array(
            0 => [
                'en' => 'Update resume',
                'es' => 'Actualizar currículum'
            ],
            1 => [
                'en' => 'Take on extra shifts',
                'es' => 'Tomar turnos adicionales'
            ],
            2 => [
                'en' => 'Start a side gig',
                'es' => 'Comienza un concierto lateral'
            ],
            3 => [
                'en' => 'Write a fnancial plan',
                'es' => 'Escribe un plan financiero'
            ],
            4 => [
                'en' => 'Read',
                'es' => 'Leer'
            ],
            5 => [
                'en' => 'Attend a seminar',
                'es' => 'Asistir a un seminario'
            ],
            6 => [
                'en' => 'Attend a local club',
                'es' => 'Asistir a un club local'
            ],
            7 => [
                'en' => 'Participate on a fundraiser',
                'es' => 'Participar en una recaudación de fondos'
            ],
            8 => [
                'en' => 'List favorite charities',
                'es' => 'Lista de organizaciones benéficas favoritas'
            ],
            9 => [
                'en' => 'RSVP to a volunteer event',
                'es' => 'RSVP a un evento voluntario'
            ],
            10 => [
                'en' => 'Study favorite artists',
                'es' => 'Estudiar artistas favoritos'
            ],
            11 => [
                'en' => 'Schedule a workshop',
                'es' => 'Programar un taller'
            ],
            12 => [
                'en' => 'Practice',
                'es' => 'Práctica'
            ],
            13 => [
                'en' => 'Research vacation ideas',
                'es' => 'Investigar ideas de vacaciones'
            ],
            14 => [
                'en' => 'Start a savings plan',
                'es' => 'Iniciar un plan de ahorro'
            ],
            15 => [
                'en' => 'Make a list',
                'es' => 'Hacer una lista'
            ],
            16 => [
                'en' => 'Get an EIN',
                'es' => 'Obtenga un EIN'
            ],
            17 => [
                'en' => 'Write business plan',
                'es' => 'Escribir plan de negocios'
            ],
            18 => [
                'en' => 'Research on taxes',
                'es' => 'Investigación sobre impuestos'
            ],
            19 => [
                'en' => 'Exercise',
                'es' => 'Ejercicio'
            ],
            20 => [
                'en' => 'Drink 8 glasses of water',
                'es' => 'Beber 8 vasos de agua'
            ],
            21 => [
                'en' => 'Take supplements',
                'es' => 'Tomar suplementos'
            ],
            22 => [
                'en' => 'Join a gym class',
                'es' => 'Únete a una clase de gimnasia'
            ]
        );

        /*$tasks = [
            'Update resume',
            'Take on extra shifts',
            'Start a side gig',
            'Write a fnancial plan',
            'Read',
            'Attend a seminar',
            'Attend a local club',
            'Participate on a fundraiser',
            'List favorite charities',
            'RSVP to a volunteer event',
            'Study favorite artists',
            'Schedule a workshop',
            'Practice',
            'Research vacation ideas',
            'Start a savings plan',
            'Make a list',
            'Get an EIN',
            'Write business plan',
            'Research on taxes',
            'Exercise',
            'Drink 8 glasses of water',
            'Take supplements',
            'Join a gym class',
        ];*/

        $language1 = $manager->getRepository(Language::class)->find(1);
        $language2 = $manager->getRepository(Language::class)->find(2);
        foreach ($tasks as $tasksName) {
            $module = new NTask();
            $manager->persist($module);
            foreach ($tasksName as $k => $name){
                $moduleTrans = new NTaskTranslation();
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
