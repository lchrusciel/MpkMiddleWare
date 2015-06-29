<?php

namespace MPK\App\Silex;

use MPK\App\Adapter\LineAdapter;
use MPK\App\Adapter\StopAdapter;
use MPK\App\Factory\LineFactory;
use MPK\App\Factory\StopFactory;
use MPK\App\Provider\MPKProvider;
use MPK\App\Repository\LineRepository;
use MPK\App\Repository\StopRepository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;

/**
 * @author Łukasz Chruściel <lukasz.chrusciel@gmail.com>
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $container['line_factory'] = function ($c) {
            return new LineFactory();
        };

        $container['stop_factory'] = function ($c) {
            return new StopFactory();
        };
        $container['line_repository'] = function ($c) {
            return new LineRepository($c['db']);
        };
        $container['stop_repository'] = function ($c) {
            return new StopRepository($c['db']);
        };
        $container['line_adapter'] = function ($c) {
            return new LineAdapter($c['line_factory'], $c['line_repository']);
        };
        $container['stop_adapter'] = function ($c) {
            return new StopAdapter($c['stop_factory'], $c['stop_repository']);
        };
        $container['mpk_provider'] = function ($c) {
            return new MPKProvider($c['line_adapter'], $c['stop_adapter']);
        };
    }
}
