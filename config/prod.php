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
