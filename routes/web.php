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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ClientController@search');
Route::get('/animals/search', 'AnimalController@search');
Route::post('/animals', 'AnimalController@index2');
Route::get('/clients', 'ClientController@index');
Route::get('/clients/create', 'ClientController@create');
Route::post('/clients', 'ClientController@index2');
Route::post('/storeclient', 'ClientController@store');

Route::get('/clients/{id}', 'ClientController@show');
Route::get('/animals', 'AnimalController@index');
Route::get('/animals/create', 'AnimalController@create');
Route::get('/animals/{id}', 'AnimalController@show');
Route::get('/animals/{id}/edit', 'AnimalController@edit');
Route::post('/animals', 'AnimalController@store');
Route::put('/clients/{id}', 'ClientController@update');        // put method can't be executed in browser
Route::delete('/clients/{id}', 'ClientController@delete');        
Route::put('/animals/{id}', 'AnimalController@update');        // put method can't be executed in browser
Route::delete('/animals/{id}', 'AnimalController@delete');        
