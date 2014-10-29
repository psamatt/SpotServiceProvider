<?php

/*
 * This file is a test to service provider for the Silex framework
 * of the Spot Project.
 *
 * @author Rodrigo Prado de Jesus <royopa@gmail.com>
 *
 */

namespace Psamatt\Silex;

use Silex\Application;

/**
 * SpotServiceProviderTest
 */
class SpotServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegister()
    {
        $app = new Application();
        $app->register(
            new SpotServiceProvider('mysql://username:password@localhost/db_name')
        );
        $this->assertInstanceOf('Spot\Mapper', $app['spot']);
    }
}
