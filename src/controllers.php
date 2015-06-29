<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Pimple\Container;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->get('/lines', function () use ($app) {
    $container = $app['container'];
    $post = $container['mpk_provider']->getAllLines();

    $response = new Response($app['serializer']->serialize($post, 'json'), 200, ['Content-Type' => 'application/json', 'charset' => 'utf-8']);

    return $response;
})
->bind('app_lines')
;
$app->get('/line/{lineId}/stops', function (Request $request) use ($app) {
    $container = $app['container'];
    $post = $container['mpk_provider']->getLineWithStops($request->attributes->get('lineId'));

    $response = new Response($app['serializer']->serialize($post, 'json'), 200, ['Content-Type' => 'application/json', 'charset' => 'utf-8']);

    return $response;
})
->bind('app_line')
;
$app->get('/stops', function () use ($app) {
    $container = $app['container'];
    $post = $container['mpk_provider']->getAllStops();

    $response = new Response($app['serializer']->serialize($post, 'json'), 200, ['Content-Type' => 'application/json', 'charset' => 'utf-8']);

    return $response;
})
->bind('app_stops')
;
$app->get('/stop/{stopId}', function (Request $request) use ($app) {
    $container = $app['container'];
    $post = $container['mpk_provider']->getStop($request->attributes->get('stopId'));

    $response = new Response($app['serializer']->serialize($post, 'json'), 200, ['Content-Type' => 'application/json', 'charset' => 'utf-8']);

    return $response;
})
->bind('app_stop')
;

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
