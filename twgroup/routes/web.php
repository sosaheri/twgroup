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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

        Route::get('index', 'PublicationController@index')->name('index');
        Route::get('crearPublicacion', 'PublicationController@create')->name('crearPublicacion');
        Route::post('guardarPublicacion', 'PublicationController@store')->name('guardarPublicacion');
        Route::get('verPublicacion/{id}', 'PublicationController@show')->name('verPublicacion');
        Route::get('editarPublicacion/{publication}', 'PublicationController@edit')->name('editarPublicacion');
        Route::post('actualizarPublicacion', 'PublicationController@update')->name('actualizarPublicacion');
        Route::get('borrarPublicacion/{publication}', 'PublicationController@destroy')->name('borrarPublicacion');


        Route::post('guardarComentario', 'CommentController@guardarComentario')->name('guardarComentario');


});
