<?php

/*
 * This is the main file of the application, including routing and controllers.
 *
 * $app is a Slim application instance, see the framework documentation for more details:
 * http://docs.slimframework.com/
 *
 * The order of the routes matter, as it will define the priority of routes. For that reason we
 * need to keep the more "generic" routes, such as the pages route, at the end of the file.
 *
 * If you decide to change the URLs, make sure to change PrismicLinkResolver in LinkResolver.php
 * as well to make sures links in your site are correctly generated.
 */

use Prismic\Api;
use Prismic\Predicates;

require_once 'includes/http.php';

/*
 *  --[ INSERT YOUR ROUTES HERE ]--
 */

// Previews
$app->get('/preview', function ($request, $response) use ($app, $prismic) {
    $token = $request->getParam('token');
    $url = $prismic->get_api()->previewSession($token, $prismic->linkResolver, '/');
    setcookie(Prismic\PREVIEW_COOKIE, $token, time() + 1800, '/', null, false, false);
    return $response->withStatus(302)->withHeader('Location', $url);
});

// Home page
$app->get('/home', function ($request, $response) use ($app, $prismic) {
    render($app, 'home');
});

/**
 * Prueba inicial con el api de Prismic, aunque seguí la documentación no logré conectar con la plataforma.
 */
$app->get('/quickstart-prismic', function ($request, $response, $args) use ($app, $prismic) {
    // Query the API
    $api = $prismic->get_api();
    $document = $api->getByUID('page', 'quickstart');

    // Render the page
    render($app, 'index', array('document' => $document));
});

/**
 * Maqueta de la prueba dos.
 */
$app->get('/', function ($request, $response) use ($app, $prismic) {
    render($app, 'maqueta');
});

/**
 * Mostrar un item.
 */
$app->get('/item/{id}', function ($request, $response, $id) use ($app, $prismic) {
    // Obtenemos los items del json.
    $string = file_get_contents("../public/items.json");
    // Convertimos los datos a un Array.
    $json = json_decode($string, true);
    // Obtenemos el item a mostrar.
    $item = $json[$id['id']-1];
    render($app, 'item', array('item' => $item));
});

// 404 Page (Keep at the bottom of the routes)
$app->get('/{id}', function ($request, $response) use ($app, $prismic) {
    render($app, '404');
});