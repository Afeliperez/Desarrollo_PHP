<?php

use App\Http\Controllers\usuarioscontroller;
use Illuminate\Support\Facades\DB;
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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/', '\App\Http\Controllers\usuarioscontroller@index');

// Route::get('/insertar', function () {
//     DB::insert("INSERT INTO usuario (name) values (?)", ["Andres"]);
// });
Route::resource('/ventanas', '\App\Http\Controllers\usuarioscontroller');
Route::resource('/cliente', '\App\Http\Controllers\cliente');
Route::resource('/incidente', '\App\Http\Controllers\incidentes');
