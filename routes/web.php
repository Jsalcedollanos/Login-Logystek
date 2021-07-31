<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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



Route::get('/admin', function () {
    return view('admin.index');
});

/* Route::get('/admin/usuarios',function(){
    return view('usuario.index');
}); */

Route::get('usuario',[UserController::class,'index']);

Route::delete('usuario/{id}',[UserController::class,'destroy'])
->name('usuario.destroy');

Route::post('usuario/index',[UserController::class,'store'])
->name('usuario.index');

Route::get('usuario/{id}/edit',[UserController::class,'edit'])
->name('usuario.edit');

Route::put('usuario/{id}',[UserController::class,'update'])
->name('usuario.edit');

Route::resource('usuario','App\Http\Controllers\UserController');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin.index');
})->name('admin');
