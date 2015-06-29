<?php

use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

// configure your app for the production environment
require __DIR__.'/properties.php';

$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

$app->register(new DoctrineServiceProvider, array(
    'db.options' => $app['database'],
));

//$app->register(new \MPK\App\Silex\ServiceProvider());

$container = new \Pimple\Container();

$container['db'] = $app['db'];

$container['line_factory'] = function ($c) {
    return new \MPK\App\Factory\LineFactory();
};

$container['stop_factory'] = function ($c) {
    return new \MPK\App\Factory\StopFactory();
};
$container['line_repository'] = function ($c) {
    return new \MPK\App\Repository\LineRepository($c['db']);
};
$container['stop_repository'] = function ($c) {
    return new \MPK\App\Repository\StopRepository($c['db']);
};
$container['line_adapter'] = function ($c) {
    return new \MPK\App\Adapter\LineAdapter($c['line_factory'], $c['line_repository']);
};
$container['stop_adapter'] = function ($c) {
    return new \MPK\App\Adapter\StopAdapter($c['stop_factory'], $c['stop_repository']);
};
$container['mpk_provider'] = function ($c) {
    return new \MPK\App\Provider\MPKProvider($c['line_adapter'], $c['stop_adapter']);
};

$app['container'] = $container;
