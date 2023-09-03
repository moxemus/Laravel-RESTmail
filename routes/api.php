<?php

use App\Http\Controllers\MailController;
use App\Http\Middleware\ApiKeyMiddleware;
use Illuminate\Support\Facades\Route;


Route::post('/send', [MailController::class, 'send'])->middleware(ApiKeyMiddleware::class);

