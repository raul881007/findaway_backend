<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Controller\User\UserPutItemController' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
include_once \dirname(__DIR__, 4).'/src/Controller/User/BaseUserController.php';
include_once \dirname(__DIR__, 4).'/src/Controller/User/UserPutItemController.php';

$this->services['App\\Controller\\User\\UserPutItemController'] = $instance = new \App\Controller\User\UserPutItemController(($this->services['security.password_encoder'] ?? $this->load('getSecurity_PasswordEncoderService.php')));

$instance->setContainer(($this->privates['.service_locator.pNNo5z3'] ?? $this->load('get_ServiceLocator_PNNo5z3Service.php'))->withContext('App\\Controller\\User\\UserPutItemController', $this));

return $instance;
