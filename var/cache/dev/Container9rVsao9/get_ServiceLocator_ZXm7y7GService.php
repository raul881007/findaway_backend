<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.zXm7y7G' shared service.

return $this->privates['.service_locator.zXm7y7G'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'navailableRepository' => ['privates', 'App\\Repository\\NAvailableRepository', 'getNAvailableRepositoryService.php', true],
], [
    'navailableRepository' => 'App\\Repository\\NAvailableRepository',
]);
