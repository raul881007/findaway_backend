<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'api_platform.action.documentation' shared service.

include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Documentation/Action/DocumentationAction.php';

return $this->services['api_platform.action.documentation'] = new \ApiPlatform\Core\Documentation\Action\DocumentationAction(($this->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()), 'Findaway', '', 'v1.0', NULL, $this->parameters['api_platform.swagger.versions']);
