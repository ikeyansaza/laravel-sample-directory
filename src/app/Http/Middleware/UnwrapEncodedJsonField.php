<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * POSTマルチパートリクエストあるいはGETリクエストで
 * JSONを送信する手段として特殊なキーを用意する
 */
class UnwrapEncodedJsonField
{
    public const JSON_FIELD_KEY = '__json';

    public function handle(Request $request, Closure $next)
    {
        $json = $request->input(static::JSON_FIELD_KEY);
        unset($request[static::JSON_FIELD_KEY]);

        if (! is_string($json)) {
            return $next($request);
        }

        $data = (array) json_decode($json, true);
        foreach ($data as $key => $value) {
            $request[$key] = $value;
        }

        return $next($request);
    }
}
