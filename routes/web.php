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


Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/mantenimiento', 'MantenimientoController@index')->name('mantenimiento');
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/crear-orden', 'MantenimientoController@crearOrden')->name('crear-orden');
    Route::get('/orden/{id}', 'MantenimientoController@edit')->name('editar-orden');
    Route::get('/imprimir-orden', 'AdminController@imprimirOrden')->name('imprimir-orden');
    Route::post('/guardar-orden', 'MantenimientoController@store')->name('guardar-orden');
    Route::put('/update-orden/{id}', 'MantenimientoController@update')->name('update-orden');

    Route::get('excelCantidadRequerimientos', 'AdminController@excelCantidadRequerimientos')->name('excelCantidadRequerimientos');
    Route::get('excelCantidadCausas', 'AdminController@excelCantidadCausas')->name('excelCantidadCausas');
    Route::get('excelCantidadTipos', 'AdminController@excelCantidadTipos')->name('excelCantidadTipos');
});
