<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.8mQL8_T' shared service.

return $this->privates['.service_locator.8mQL8_T'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'nspecicOutcomeRepository' => ['privates', 'App\\Repository\\NSpecicOutcomeRepository', 'getNSpecicOutcomeRepositoryService.php', true],
], [
    'nspecicOutcomeRepository' => 'App\\Repository\\NSpecicOutcomeRepository',
]);
