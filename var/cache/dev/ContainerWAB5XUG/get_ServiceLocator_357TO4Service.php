<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.357TO4_' shared service.

return $this->privates['.service_locator.357TO4_'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'authenticationSuccessHandler' => ['privates', 'lexik_jwt_authentication.handler.authentication_success', 'getLexikJwtAuthentication_Handler_AuthenticationSuccessService.php', true],
    'partnerRepository' => ['privates', 'App\\Repository\\PartnerRepository', 'getPartnerRepositoryService.php', true],
], [
    'authenticationSuccessHandler' => '?',
    'partnerRepository' => 'App\\Repository\\PartnerRepository',
]);
