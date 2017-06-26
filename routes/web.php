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

// index
use App\Services\Core\Contracts\Epg;

$app->get('/', function () use ($app) {
    return $app->getRoutes();
});

$app->group(['middleware' => 'services.site'], function () use ($app) {
    $app->get('{siteId}', function ($siteId) {
        return 'base-page';
    });

    $app->get('/{siteId}/epg', function (Epg $epg) {
        return $epg->getData();
    });
});
