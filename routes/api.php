<?php

use App\Http\Controllers\mailController;
use App\Http\Middleware\ApiKeyMiddleware;
use Illuminate\Support\Facades\Route;


Route::post('/send', [mailController::class, 'send'])->middleware(ApiKeyMiddleware::class);

