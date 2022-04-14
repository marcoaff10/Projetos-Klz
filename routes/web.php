<?php

use App\Http\Controllers\NavigationController;
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
//     return view('welcome');
// });
 Route::get('/',[NavigationController::class,'home'])->name('home');
 Route::get('/eventos/criar',[NavigationController::class,'create'])->name('criar_evento')->middleware('auth');
 Route::get('/eventos/{id}',[NavigationController::class,'show'])->name('mostrar_evento');
 Route::post('/eventos/criar',[NavigationController::class,'store'])->name('criar');
 Route::post('/eventos/join/{id}',[NavigationController::class,'joinEvent'])->name('participar');
 Route::get('/dashboard',[NavigationController::class,'dashboard'])->name('painel')->middleware('auth');
 Route::delete('/eventos/{id}',[NavigationController::class,'destroy'])->name('deletar')->middleware('auth');
 Route::get('eventos/edit/{id}',[NavigationController::class,'edit'])->name('editar')->middleware('auth');
Route::put('eventos/edit/{id}',[NavigationController::class,'update'])->name('update')->middleware('auth');
Route::post('eventos/join/{id}',[NavigationController::class,'joinEvent'])->name('participar')->middleware('auth');
Route::delete('eventos/leave/{id}',[NavigationController::class,'leaveEvent'])->name('sair_evento')->middleware('auth');
