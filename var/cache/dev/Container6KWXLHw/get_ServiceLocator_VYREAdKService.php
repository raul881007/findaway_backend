<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.vYREAdK' shared service.

return $this->privates['.service_locator.vYREAdK'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'npersonalityStyleRepository' => ['privates', 'App\\Repository\\NPersonalityStyleRepository', 'getNPersonalityStyleRepositoryService.php', true],
], [
    'npersonalityStyleRepository' => 'App\\Repository\\NPersonalityStyleRepository',
]);
