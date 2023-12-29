<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::controller(UserController::class)->group(function(){
    Route::get('/','index')->name('dashboard');
    Route::get('/dashboard/export/','export')->name('export');
    Route::post('/dashboard/import/','import')->name('import');
});
