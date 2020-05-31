<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'security.firewall.map.context.frontend_partner' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/security-bundle/Security/FirewallContext.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Util/TargetPathTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Firewall/ExceptionListener.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-bundle/Security/FirewallConfig.php';

return $this->privates['security.firewall.map.context.frontend_partner'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(new RewindableGenerator(function () {
    yield 0 => ($this->privates['security.channel_listener'] ?? $this->load('getSecurity_ChannelListenerService.php'));
    yield 1 => ($this->privates['security.authentication.listener.guard.frontend_partner'] ?? $this->load('getSecurity_Authentication_Listener_Guard_FrontendPartnerService.php'));
    yield 2 => ($this->privates['security.access_listener'] ?? $this->load('getSecurity_AccessListenerService.php'));
}, 3), new \Symfony\Component\Security\Http\Firewall\ExceptionListener(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver())), ($this->privates['security.http_utils'] ?? $this->load('getSecurity_HttpUtilsService.php')), 'frontend_partner', ($this->privates['lexik_jwt_authentication.security.guard.jwt_token_authenticator'] ?? $this->load('getLexikJwtAuthentication_Security_Guard_JwtTokenAuthenticatorService.php')), NULL, NULL, ($this->privates['monolog.logger.security'] ?? $this->load('getMonolog_Logger_SecurityService.php')), true), NULL, new \Symfony\Bundle\SecurityBundle\Security\FirewallConfig('frontend_partner', 'security.user_checker', '.security.request_matcher.tr6McJp', true, true, 'security.user.provider.concrete.partner_provider', NULL, 'lexik_jwt_authentication.jwt_token_authenticator', NULL, NULL, [0 => 'guard'], NULL));
