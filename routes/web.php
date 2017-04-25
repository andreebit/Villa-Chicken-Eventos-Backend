<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->group(['prefix' => 'api', 'namespace' => 'Api'], function () use ($app) {
    $app->group(['prefix' => 'v1', 'namespace' => 'V1'], function () use ($app) {

        //event types
        $app->get('event-types', 'EventTypeController@index');

        //service-categories
        $app->get('service-categories', 'ServiceCategoryController@index');

        //packages
        $app->get('packages', 'CustomersController@index');
        $app->get('packages/{id}', 'CustomersController@get');
        $app->post('packages', 'CustomersController@post');
        $app->put('packages/{id}', 'CustomersController@put');
        $app->patch('packages/{id}', 'CustomersController@patch');
        $app->delete('packages/{id}', 'CustomersController@delete');

    });
});