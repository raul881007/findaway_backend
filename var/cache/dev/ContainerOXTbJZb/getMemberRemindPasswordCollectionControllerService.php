<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\Controller\Member\MemberRemindPasswordCollectionController' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
include_once \dirname(__DIR__, 4).'/src/Controller/User/BaseUserController.php';
include_once \dirname(__DIR__, 4).'/src/Controller/Member/MemberRemindPasswordCollectionController.php';

$this->services['App\\Controller\\Member\\MemberRemindPasswordCollectionController'] = $instance = new \App\Controller\Member\MemberRemindPasswordCollectionController(($this->services['security.password_encoder'] ?? $this->load('getSecurity_PasswordEncoderService.php')));

$instance->setContainer(($this->privates['.service_locator.pNNo5z3'] ?? $this->load('get_ServiceLocator_PNNo5z3Service.php'))->withContext('App\\Controller\\Member\\MemberRemindPasswordCollectionController', $this));

return $instance;
