<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.rOOVBlf' shared service.

return $this->privates['.service_locator.rOOVBlf'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'partner' => ['privates', '.errored..service_locator.rOOVBlf.Symfony\\Component\\Security\\Core\\User\\UserInterface', NULL, 'Cannot autowire service ".service_locator.rOOVBlf": it references interface "Symfony\\Component\\Security\\Core\\User\\UserInterface" but no such service exists. Did you create a class that implements this interface?'],
], [
    'partner' => 'Symfony\\Component\\Security\\Core\\User\\UserInterface',
]);