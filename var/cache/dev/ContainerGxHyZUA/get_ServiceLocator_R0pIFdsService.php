<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.r0pIFds' shared service.

return $this->privates['.service_locator.r0pIFds'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'data' => ['privates', '.errored..service_locator.r0pIFds.App\\Entity\\Supervisor', NULL, 'Cannot autowire service ".service_locator.r0pIFds": it references class "App\\Entity\\Supervisor" but no such service exists.'],
    'em' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
    'params' => ['privates', 'parameter_bag', 'getParameterBagService', false],
    'validator' => ['privates', 'api_platform.validator', 'getApiPlatform_ValidatorService.php', true],
], [
    'data' => 'App\\Entity\\Supervisor',
    'em' => '?',
    'params' => '?',
    'validator' => '?',
]);
