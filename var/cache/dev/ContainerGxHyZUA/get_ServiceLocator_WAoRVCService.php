<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.WAo_RVC' shared service.

return $this->privates['.service_locator.WAo_RVC'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'data' => ['privates', '.errored..service_locator.WAo_RVC.App\\Entity\\MemberProjects', NULL, 'Cannot autowire service ".service_locator.WAo_RVC": it references class "App\\Entity\\MemberProjects" but no such service exists.'],
    'em' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
    'partner' => ['privates', '.errored..service_locator.WAo_RVC.Symfony\\Component\\Security\\Core\\User\\UserInterface', NULL, 'Cannot autowire service ".service_locator.WAo_RVC": it references interface "Symfony\\Component\\Security\\Core\\User\\UserInterface" but no such service exists. Did you create a class that implements this interface?'],
], [
    'data' => 'App\\Entity\\MemberProjects',
    'em' => '?',
    'partner' => 'Symfony\\Component\\Security\\Core\\User\\UserInterface',
]);
