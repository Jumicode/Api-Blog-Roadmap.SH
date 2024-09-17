<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiblogController;


Route::get('/blog', [ApiblogController::class, 'index']);

Route::get('/blog/{id}', [ApiblogController::class,'show']);

Route::post('/blog', [ApiblogController::class, 'store']);

Route::put('/blog/{id}', [ApiblogController::class,'update']);

Route::patch('/blog/{id}', [ApiblogController::class,'update']);

Route::delete('/blog/{id}', [ApiblogController::class, 'destroy']);

