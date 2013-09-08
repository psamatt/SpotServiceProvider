<?php

/*
 * This file is part of SpotServiceProvider.
 *
 * (c) Matt Goodwin <matt.goodwin491@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psamatt\Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class SpotServiceProvider implements ServiceProviderInterface
{
    /**
     * Database dsn
     *
     * @access private
     * @var string
     */
    private $dsn;

    /**
     * Constructor
     *
     * @param string $dsn
     */
    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    /**
     * {@inheritdoc}
     */
    public function register(Application $app)
    {
        $config = $this->connect();
        
        $app['spot'] = new \Spot\Mapper($config);
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }

    /**
     * Connect to the database using the dsn
     *
     * @return Config
     */
    private function connect()
    {
        $cfg = new \Spot\Config();

        if (!filter_var($this->dsn, FILTER_VALIDATE_URL)) {
            throw new \RuntimeException('DSN specified is not valid');
        }
        
        $adapter = $cfg->addConnection('conn_db', $this->dsn);
        
        return $cfg;
    }
}
