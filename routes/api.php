<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\productImageController;
use App\Http\Controllers\ProductsVariableController;


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


//-----------------rutas de productos

Route::get('/productos',[ProductsController::class,'index'] );//mostrar todos los registros

Route::post('/productos', [ProductsController::class,'store']);//Crear un registro

Route::get('/productos/edit/{id}',[ProductsController::class,'edit']);//devuelve un registro

Route::put('/productos/{id}', [ProductsController::class,'update']);//editar un registro

Route::delete('/productos/{id}', [ProductsController::class,'destroy']);//eliminar un registro

//-----------------rutas de las imagenes de productos

Route::get('/productosImages',[productImageController::class,'index'] );//mostrar todos los registros

Route::post('/productosImages', [productImageController::class,'store']);//Crear un registro

Route::get('/productosImages/edit/{id}',[productImageController::class,'edit']);//devuelve un registro

Route::put('/productosImages/{id}', [productImageController::class,'update']);//editar un registro

Route::delete('/productosImages/{id}', [productImageController::class,'destroy']);//eliminar un registro

//-----------------rutas de las imagenes de productos

Route::get('/productosVariables',[ProductsVariableController::class,'index'] );//mostrar todos los registros

Route::post('/productosVariables', [ProductsVariableController::class,'store']);//Crear un registro

Route::get('/productosVariables/edit/{id}',[ProductsVariableController::class,'edit']);//devuelve un registro

Route::put('/productosVariables/{id}', [ProductsVariableController::class,'update']);//editar un registro

Route::delete('/productosVariables/{id}', [ProductsVariableController::class,'destroy']);//eliminar un registro