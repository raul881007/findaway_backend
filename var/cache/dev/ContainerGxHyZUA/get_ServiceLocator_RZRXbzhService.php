<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.RZRXbzh' shared service.

return $this->privates['.service_locator.RZRXbzh'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'ntaskRepository' => ['privates', 'App\\Repository\\NTaskRepository', 'getNTaskRepositoryService.php', true],
], [
    'ntaskRepository' => 'App\\Repository\\NTaskRepository',
]);
