<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'security.authentication.listener.json.login' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Firewall/AbstractListener.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Firewall/UsernamePasswordJsonAuthenticationListener.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/AuthenticationSuccessHandlerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/CustomAuthenticationSuccessHandler.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/AuthenticationFailureHandlerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/CustomAuthenticationFailureHandler.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Session/SessionAuthenticationStrategyInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Session/SessionAuthenticationStrategy.php';

$this->privates['security.authentication.listener.json.login'] = $instance = new \Symfony\Component\Security\Http\Firewall\UsernamePasswordJsonAuthenticationListener(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()), ($this->privates['security.http_utils'] ?? $this->load('getSecurity_HttpUtilsService.php')), 'login', new \Symfony\Component\Security\Http\Authentication\CustomAuthenticationSuccessHandler(($this->privates['lexik_jwt_authentication.handler.authentication_success'] ?? $this->load('getLexikJwtAuthentication_Handler_AuthenticationSuccessService.php')), [], 'login'), new \Symfony\Component\Security\Http\Authentication\CustomAuthenticationFailureHandler(($this->privates['lexik_jwt_authentication.handler.authentication_failure'] ?? $this->load('getLexikJwtAuthentication_Handler_AuthenticationFailureService.php')), []), ['check_path' => '/login', 'username_path' => 'username', 'password_path' => 'password', 'require_previous_session' => false, 'use_forward' => false], ($this->privates['monolog.logger.security'] ?? $this->load('getMonolog_Logger_SecurityService.php')), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->privates['property_accessor'] ?? $this->getPropertyAccessorService()));

$instance->setSessionAuthenticationStrategy(($this->privates['security.authentication.session_strategy_noop'] ?? ($this->privates['security.authentication.session_strategy_noop'] = new \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy('none'))));

return $instance;
