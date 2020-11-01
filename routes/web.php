<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/participants', 'App\Http\Controllers\ParticipantController@index');
Route::get('/add_participant', 'App\Http\Controllers\ParticipantController@create');
Route::post('/add_participant', 'App\Http\Controllers\ParticipantController@store');
Route::get('/edit_participant/{id}', 'App\Http\Controllers\ParticipantController@edit');
Route::put('/edit_participant/{id}', 'App\Http\Controllers\ParticipantController@update');