<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require_once __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

return $loader;
