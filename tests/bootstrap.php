<?php

/*
 * This file is part of the SpotServiceProvider package.
 *
 * (c) Rodrigo Prado de Jesus <royopa@gmail.com>
 *
 */

$loader = require __DIR__.'/../../../../vendor/autoload.php';
$loader->add('Psamatt\Silex', __DIR__);
require_once __DIR__.'/../src/Psamatt/Silex/SpotServiceProvider.php';
