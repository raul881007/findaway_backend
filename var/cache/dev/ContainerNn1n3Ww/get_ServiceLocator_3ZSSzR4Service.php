<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.3ZSSzR4' shared service.

return $this->privates['.service_locator.3ZSSzR4'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'nfeedbackRepository' => ['privates', 'App\\Repository\\NFeedbackRepository', 'getNFeedbackRepositoryService.php', true],
], [
    'nfeedbackRepository' => 'App\\Repository\\NFeedbackRepository',
]);
