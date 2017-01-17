<?php

/**
 * @var \Composer\Autoload\ClassLoader $loader
 */
$loader = require dirname(__DIR__) . '/vendor/autoload.php';

$loader->addPsr4('DeimosController\\', 'classes/');
$loader->addPsr4('DeimosSrc\\', 'src/');