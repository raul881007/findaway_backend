<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.Bw5pZyW' shared service.

return $this->privates['.service_locator.Bw5pZyW'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'nlevelUrgencyRepository' => ['privates', 'App\\Repository\\NLevelUrgencyRepository', 'getNLevelUrgencyRepositoryService.php', true],
], [
    'nlevelUrgencyRepository' => 'App\\Repository\\NLevelUrgencyRepository',
]);