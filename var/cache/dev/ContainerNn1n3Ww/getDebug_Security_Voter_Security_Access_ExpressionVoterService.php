<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'debug.security.voter.security.access.expression_voter' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/Authorization/Voter/VoterInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/Authorization/Voter/TraceableVoter.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/Authorization/Voter/ExpressionVoter.php';

return $this->privates['debug.security.voter.security.access.expression_voter'] = new \Symfony\Component\Security\Core\Authorization\Voter\TraceableVoter(new \Symfony\Component\Security\Core\Authorization\Voter\ExpressionVoter(($this->privates['security.expression_language'] ?? $this->getSecurity_ExpressionLanguageService()), ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver())), ($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()), ($this->privates['security.role_hierarchy'] ?? $this->getSecurity_RoleHierarchyService())), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));
