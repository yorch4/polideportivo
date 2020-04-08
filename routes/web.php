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
Route::get('/index', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/instalaciones/{name}', 'HomeController@facilities');
Route::get('noticias', 'HomeController@articles');
Route::group(['middleware' => 'auth'], function() {
    Route::get('perfil', 'HomeController@profile');
    Route::post('perfil/modificar', 'HomeController@updateProfile');
    Route::get('perfil/modificar', 'HomeController@profile');
    Route::post('perfil/confirmarModificar', 'HomeController@postUpdateProfile');
});

//CONTROL
Route::group(['middleware' => 'admin'], function() {
    Route::get('/control/usuarios', 'AdminController@users');
    Route::get('/control/usuarios/anadir', 'AdminController@addUser');
    Route::get('/control/usuarios/modificar/{id}', 'AdminController@updateUser');
    Route::post('/control/usuarios/modificar/{id}', 'AdminController@postUpdateUser');
    Route::post('/control/usuarios/anadir', 'AdminController@postAddUser');
    Route::post('/control/usuarios/eliminar', 'AdminController@deleteUser');

    Route::get('/control/instalaciones', 'AdminController@facilities');
    Route::get('/control/instalaciones/anadir', 'AdminController@addFacility');
    Route::post('/control/instalaciones/anadir', 'AdminController@postAddFacility');
    Route::post('/control/instalaciones/eliminar', 'AdminController@deleteFacility');
    Route::get('/control/instalaciones/modificar/{id}', 'AdminController@updateFacility');
    Route::post('/control/instalaciones/modificar/{id}', 'AdminController@postUpdateFacility');

    Route::get('/control/campos', 'AdminController@fields');
    Route::get('/control/campos/anadir', 'AdminController@addField');
    Route::post('/control/campos/anadir', 'AdminController@postAddField');
    Route::post('/control/campos/eliminar', 'AdminController@deleteField');
    Route::get('/control/campos/modificar/{id}', 'AdminController@updateField');
    Route::post('/control/campos/modificar/{id}', 'AdminController@postUpdateField');

    Route::get('/control/alquileres', 'AdminController@rents');
    Route::get('/control/alquileres/anadir', 'AdminController@addRent');
    Route::post('/control/alquileres/anadir', 'AdminController@postAddRent');
    Route::post('/control/alquileres/eliminar', 'AdminController@deleteRent');
    Route::get('/control/alquileres/modificar/{id}', 'AdminController@updateRent');
    Route::post('/control/alquileres/modificar/{id}', 'AdminController@confirmUpdateRent');
    Route::post('/control/alquileres/modificar-siguiente', 'AdminController@nextUpdateRent');
    Route::post('/control/alquileres/modificar-siguiente/hora', 'AdminController@postNextUpdateRent');

    Route::get('/control/noticias', 'AdminController@articles');
    Route::get('/control/noticias/anadir', 'AdminController@addArticle');
    Route::post('/control/noticias/anadir', 'AdminController@postAddArticle');
    Route::post('/control/noticias/eliminar', 'AdminController@deleteArticle');
    Route::get('/control/noticias/modificar/{id}', 'AdminController@updateArticle');
    Route::post('/control/noticias/modificar/{id}', 'AdminController@postUpdateArticle');
});

//RESERVAS
Route::group(['middleware' => 'auth'], function() {
    Route::get('/reservas', 'RentController@index');
    Route::get('/reservas/{id}', 'RentController@calendar');
    Route::post('/reservas/{id}', 'RentController@sections');
    Route::post('/confirmar-reserva', 'RentController@confirm');
    Route::get('/confirmar-reserva', 'HomeController@index');
});

Auth::routes();

