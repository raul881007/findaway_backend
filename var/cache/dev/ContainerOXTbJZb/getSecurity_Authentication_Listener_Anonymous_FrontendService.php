<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'security.authentication.listener.anonymous.frontend' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Firewall/AbstractListener.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Firewall/AnonymousAuthenticationListener.php';

return $this->privates['security.authentication.listener.anonymous.frontend'] = new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener(($this->privates['security.untracked_token_storage'] ?? ($this->privates['security.untracked_token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), $this->getParameter('container.build_hash'), ($this->privates['monolog.logger.security'] ?? $this->load('getMonolog_Logger_SecurityService.php')), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()));
