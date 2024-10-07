<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;

Route::get('/', [SocialController::class, 'index']);
Route::post('/newpost', [SocialController::class, 'create']);
