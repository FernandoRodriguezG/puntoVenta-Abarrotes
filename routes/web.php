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
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/guardaproducto','ProductosController@guardaProductos');
Route::get('/nuevoProducto','ProductosController@new');
Route::get('/productos','ProductosController@index');
Route::get('/editar/{id}','ProductosController@edita');

Route::post('/guardausuario','NewUser@create');
Route::get('/nuevousuario','NewUser@pantalla');
Route::get('/usuarios','NewUser@mostrar');
Route::get('/editausuario/{id}','NewUser@editarUsuario');
Route::post('/editUser','NewUser@edit');
Route::get('/borrausuario/{id}','NewUser@borrar');


Route::get('/nuevaVenta','VentasController@nuevaVen');
Route::get('/buscaProducto','ProductosController@busqueda');
Route::get('/EliminaProducto/{id}','ProductosController@eliminaProducto');


Route::post('/addprod','CarritoController@addCarrito');
Route::get('/eliminaCarro/{id}','CarritoController@eliminar');
Route::get('/agregauno/{id}','CarritoController@agregUno');
Route::get('/quitauno/{id}','CarritoController@quitaUno');
Route::get('/borrarCarrito','CarritoController@borrarCarrito');
Route::get('/ventaExitosa','VentasController@finalizaVenta');
Route::get('/verVentas','VentasController@historialVentas');

Route::get('/detalleVenta/{id}','VentasController@detallesVenta');



Route::get('/notaVenta/{id}','VentasController@PruebaPDF');
