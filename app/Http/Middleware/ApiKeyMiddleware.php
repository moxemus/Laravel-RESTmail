<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiKeyMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if ($request->get('apikey') !== env('APP_API_KEY')) {
            return response()->json(['result' => 'Not valid api key'], 401,
                ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
        }

        return $next($request);
    }
}
