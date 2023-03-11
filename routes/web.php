<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[UserController::class,'userreg'])->name('user.reg');
Route::post('/reg',[UserController::class,'regstore'])->name('user.store.reg');


Route::get("/login", [UserController::class,'userauth'])->name('user.login');
Route::post("/login",[UserController::class,'userauthmatch'])->name('user.auth.match');

Route::get('/notification',[UserController::class,'notify'])->name('notification');