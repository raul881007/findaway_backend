<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.wohUMC8' shared service.

return $this->privates['.service_locator.wohUMC8'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'npreferredTimeRepository' => ['privates', 'App\\Repository\\NPreferredTimeRepository', 'getNPreferredTimeRepositoryService.php', true],
], [
    'npreferredTimeRepository' => 'App\\Repository\\NPreferredTimeRepository',
]);
