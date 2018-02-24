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

use tajawal\Api\EntryPoint;
use Illuminate\Http\Request;

$router->get('/tajawal/{type}', function (Request $request) {
    $routes = new EntryPoint();
    return $routes->processRequest($request->path(), $request->getMethod(), $request->headers->all(), $request->all());
});
