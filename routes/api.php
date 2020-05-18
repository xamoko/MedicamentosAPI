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

Route::post('login', 'usuarios2@login');
Route::post('register', 'usuarios2@register');
Route::post('TodosMedicamentos', 'medicamentosController@TodosMedicamentos');
Route::get('exportar', 'medicamentosController@exportar');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'usuarios2@details');
Route::post('AgregarMedicamentos', 'medicamentosController@AgregarMedicamentos');
Route::post('EditarMedicamento/{id}', 'medicamentosController@EditarMedicamento');

});
