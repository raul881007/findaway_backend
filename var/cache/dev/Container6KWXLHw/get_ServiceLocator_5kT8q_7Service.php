<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.5kT8q.7' shared service.

return $this->privates['.service_locator.5kT8q.7'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'data' => ['privates', '.errored..service_locator.5kT8q.7.Symfony\\Component\\Security\\Core\\User\\UserInterface', NULL, 'Cannot autowire service ".service_locator.5kT8q.7": it references interface "Symfony\\Component\\Security\\Core\\User\\UserInterface" but no such service exists. Did you create a class that implements this interface?'],
], [
    'data' => 'Symfony\\Component\\Security\\Core\\User\\UserInterface',
]);