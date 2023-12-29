<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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



Route::controller(UserController::class)->group(function(){
    Route::get('/','index')->name('dashboard');
    Route::get('/dashboard/export/','export')->name('export');
    Route::post('/dashboard/import/','import')->name('import');
});
