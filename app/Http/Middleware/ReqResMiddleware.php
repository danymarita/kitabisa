<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class ReqResMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $reqContent = $request->getContent();
        $routeArray = $request->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        Log::info('Req '.$controllerAction.': '.$reqContent);
        $response = $next($request);
        Log::info('Res '.$controllerAction.': '.$response);
        return $response;
    }
}
