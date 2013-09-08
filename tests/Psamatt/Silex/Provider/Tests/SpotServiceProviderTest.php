<?php

namespace Psamatt\Silex\Provider\Tests;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

use Psamatt\Silex\Provider\SpotServiceProvider;

class SpotServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        if (!class_exists('Silex\Application')) {
            $this->markTestSkipped('Silex is not available');
        }
    }

    public function testRegisterWithDSN()
    {
        $app = new Application();
        $app->register(new SpotServiceProvider('mysql://host=localhost;dbname=testdb'));

        $app->get('/', function() use($app) {
            $app['spot'];
        });
        $request = Request::create('/');
        $app->handle($request);
        
        $this->assertInstanceOf('\Spot\Mapper', $app['spot']);
    }
}
