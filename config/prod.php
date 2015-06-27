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

$app->register(new DoctrineOrmServiceProvider, array(
    'orm.proxies_dir' => __DIR__.'/cache/doctrine/proxy',
    'orm.em.options' => array(
        'mappings' => array(
            array(
                'type' => 'simple_yml',
                'namespace' => 'MPK\App\Entity',
                'path' => __DIR__.'/../src/App/Resources/doctrine',
            ),
        ),
    ),
));
