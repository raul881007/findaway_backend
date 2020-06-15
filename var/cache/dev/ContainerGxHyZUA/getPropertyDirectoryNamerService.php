<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'Vich\UploaderBundle\Naming\PropertyDirectoryNamer' shared service.

include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Naming/DirectoryNamerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Naming/ConfigurableInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Naming/PropertyDirectoryNamer.php';

return $this->services['Vich\\UploaderBundle\\Naming\\PropertyDirectoryNamer'] = new \Vich\UploaderBundle\Naming\PropertyDirectoryNamer(($this->privates['property_accessor'] ?? $this->getPropertyAccessorService()), ($this->privates['Vich\\UploaderBundle\\Util\\Transliterator'] ?? $this->load('getTransliteratorService.php')));