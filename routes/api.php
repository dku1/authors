<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('{author}/books/list', 'App\Http\Controllers\Api\BookController@books');
Route::get('{id}/books/by-id', 'App\Http\Controllers\Api\BookController@book');
Route::put('{book}/books/update', 'App\Http\Controllers\Api\BookController@update');
Route::delete('{book}/books/id', 'App\Http\Controllers\Api\BookController@delete');

