<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'EventController@home');
Route::get('/result', 'EventController@result');
Route::get('/result_filter', 'EventController@filter_results');
Route::post('/create', 'EventController@add_event');

