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
        $app->get('packages', 'PackageController@index');
        $app->get('packages/{id}', 'PackageController@get');
        $app->post('packages', 'PackageController@post');
        $app->put('packages/{id}', 'PackageController@put');
        $app->patch('packages/{id}', 'PackageController@patch');
        $app->delete('packages/{id}', 'PackageController@delete');


        //customers
        $app->get('customers/document/{type}/{number}', 'CustomerController@getByDocument');

        //lounges
        $app->get('lounges/local/{id}', 'LoungeController@getByLocal');

        //materials
        $app->get('materials/event-type/{id}', 'MaterialController@getByEventType');

        //quotations
        $app->get('quotations', 'QuotationController@index');
        $app->get('quotations/{id}', 'QuotationController@get');
        $app->post('quotations', 'QuotationController@post');
        $app->put('quotations/{id}', 'QuotationController@put');
        $app->patch('quotations/{id}', 'QuotationController@patch');
        $app->delete('quotations/{id}', 'QuotationController@delete');

    });
});