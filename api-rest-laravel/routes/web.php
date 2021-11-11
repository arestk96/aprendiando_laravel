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
//rutas de prueba
Route::get('/', function () {
    return view('welcome');
});

Route::get('/pruebas/{nombre?}', function($nombre = null){

  $texto = '<h2>Texto desde una ruta</h2>';
  $texto .= 'Nombre: '.$nombre;

  return view('pruebas', array(
    'texto' => $texto
  ));
});

Route::get('/animales', 'PruebasController@index');

Route::get('/videojuegos/mis_juegos_fav', 'VideojuegosController@index');
Route::get('/test-ORM', 'PruebasController@testORM');

//rutas de api_rest_laravel
  //rutas de prueba
  Route::get('/usuario/pruebas', 'Usercontroller@pruebas');
  Route::get('/categoria/pruebas', 'Categorycontroller@pruebas');
  Route::get('/entrada/pruebas', 'Postcontroller@pruebas');

  //rutas del controlador de usuarios
  Route::post('/api/login', 'Usercontroller@login');
  Route::post('/api/register', 'Usercontroller@register');
