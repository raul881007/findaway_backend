<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.PqTwdds' shared service.

return $this->privates['.service_locator.PqTwdds'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'nlevelUrgencyTranslationRepository' => ['privates', 'App\\Repository\\NLevelUrgencyTranslationRepository', 'getNLevelUrgencyTranslationRepositoryService.php', true],
], [
    'nlevelUrgencyTranslationRepository' => 'App\\Repository\\NLevelUrgencyTranslationRepository',
]);
