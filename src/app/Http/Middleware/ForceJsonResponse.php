<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use ReflectionProperty;

/**
 * レスポンスのContent-Typeをapplication/jsonのみに限定する
 */
class ForceJsonResponse
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        // Acceptヘッダの解析結果をクリアする
        $cache = new ReflectionProperty($request, 'acceptableContentTypes');
        $cache->setAccessible(true);
        $cache->setValue($request, null);

        return $next($request);
    }
}
