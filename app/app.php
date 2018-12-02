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

/**
 * Maqueta de la prueba dos con el api de Prismic.
 */
$app->get('/', function ($request, $response, $args) use ($app, $prismic) {
    // Inicializa el API de Prismic.
    $api = $prismic->get_api();
    // Consulta de todos los items.
    $response = $api->query('');

    // Render the page
    render($app, 'index', array('items' => $response->results));
});

/**
 * Filtro de los items en Prismic
 */
$app->get('/filtro/{categoria}', function ($request, $response, $params) use ($app, $prismic) {
    // Inicializa el API de Prismic.
    $api = $prismic->get_api();
    // Comprueba si ha seleccionado una categoria.
    if($params['categoria'] != 'Todos'){
        // Consulta de los items por categoria.
        $response = $api->query(
            Predicates::at('document.tags', [$params['categoria']]),
            ['pageSize' => 50]
        );
    } else {
        // Consulta de todos los items.
        $response = $api->query('');
    }
    /**
     * Inicializa donde se almacenará los items.
     */
    $items = array();
    foreach ($response->results as $key => $item) {
        /**
         * Agregar cada item a la lista.
         */
        $itemPush = array(
                'id' => $item->id,
                'img' => isset($item->data->image->url) ? $item->data->image->url : '/images/star.png',
                'name' => $item->data->title[0]->text,
                'category' => $item->tags,
                'description' => $item->data->description[0]->text
            );
        array_push($items, $itemPush);
    }
    /**
     * Retorna un JSON con la lista de items filtrados.
     */
    echo $json = json_encode($items);
});

/**
 * Mostrar un item.
 */
$app->get('/item/{id}', function ($request, $response, $params) use ($app, $prismic) {
    // Inicializa el API de Prismic.
    $api = $prismic->get_api();
    // Realiza la consulta de un item.
    $query = $api->getByID($params['id']);
    $item = array(
        'id' => $query->id,
        'img' => isset($query->data->image->url) ? $query->data->image->url : '/images/star.png',
        'name' => $query->data->title[0]->text,
        'category' => $query->tags,
        'description' => $query->data->description[0]->text
    );
    render($app, 'item', array('item' => $item));
});

// 404 Page (Keep at the bottom of the routes)
$app->get('/{id}', function ($request, $response) use ($app, $prismic) {
    render($app, '404');
});