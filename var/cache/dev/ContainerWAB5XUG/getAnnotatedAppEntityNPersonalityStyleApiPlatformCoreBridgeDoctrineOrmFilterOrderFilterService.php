<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'annotated_app_entity_n_personality_style_api_platform_core_bridge_doctrine_orm_filter_order_filter' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Api/FilterInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Doctrine/Orm/Filter/FilterInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Doctrine/Common/PropertyHelperTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Doctrine/Orm/PropertyHelperTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Doctrine/Orm/Filter/AbstractFilter.php';
include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Doctrine/Orm/Filter/ContextAwareFilterInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Doctrine/Orm/Filter/AbstractContextAwareFilter.php';
include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Doctrine/Common/Filter/OrderFilterInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Doctrine/Common/Filter/OrderFilterTrait.php';
include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Doctrine/Orm/Filter/OrderFilter.php';

return $this->privates['annotated_app_entity_n_personality_style_api_platform_core_bridge_doctrine_orm_filter_order_filter'] = new \ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter(($this->services['doctrine'] ?? $this->getDoctrineService()), NULL, 'order', ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()), ['id' => NULL, 'translations.name' => NULL, 'createdAt' => NULL, 'updatedAt' => NULL], ($this->privates['serializer.name_converter.metadata_aware'] ?? $this->getSerializer_NameConverter_MetadataAwareService()));
