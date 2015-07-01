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
$container['timetable_factory'] = function ($c) {
    return new \MPK\App\Factory\TimetableFactory($c['stop_factory'], $c['line_factory']);
};
$container['connection_factory'] = function ($c) {
    return new \MPK\App\Factory\ConnectionFactory($c['line_factory'], $c['stop_factory']);
};
$container['timetable_repository'] = function ($c) {
    return new \MPK\App\Repository\TimetableRepository($c['db']);
};
$container['line_repository'] = function ($c) {
    return new \MPK\App\Repository\LineRepository($c['db']);
};
$container['connection_repository'] = function ($c) {
    return new \MPK\App\Repository\ConnectionRepository($c['db']);
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
$container['timetable_adapter'] = function ($c) {
    return new \MPK\App\Adapter\TimetableAdapter($c['timetable_factory'], $c['timetable_repository']);
};
$container['connection_adapter'] = function ($c) {
    return new \MPK\App\Adapter\ConnectionAdapter($c['connection_repository'], $c['connection_factory']);
};
$container['route_calculator_adapter'] = function ($c) {
    return new \MPK\App\Adapter\CalculatorAdapter($c['route_calculator']);
};
$container['route_calculator'] = function ($c) {
    return new \MPK\App\Calculator\RouteCalculator($c['stop_adapter'], $c['connection_adapter']);
};
$container['mpk_provider'] = function ($c) {
    return new \MPK\App\Provider\MPKProvider(
        $c['line_adapter'],
        $c['stop_adapter'],
        $c['timetable_adapter'],
        $c['route_calculator_adapter']
    );
};

$app['container'] = $container;
