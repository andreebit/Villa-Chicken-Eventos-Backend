<?php

namespace App\Http\Middleware;

use App\Exceptions\NotJsonException;
use Mambo\Exceptions\Types\BadRequestException;
use Closure;

class ContentTypeMiddleware
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws BadRequestException
     */
    public function handle($request, Closure $next)
    {
        $method = $request->method();
        $jsonAllowedMethods = [self::METHOD_POST, self::METHOD_PUT, self::METHOD_PATCH, self::METHOD_DELETE];

        if ($request->isJson() && in_array($method, $jsonAllowedMethods)) {
            return $next($request);
        } else if ($method == self::METHOD_GET || $method == self::METHOD_DELETE) {
            return $next($request);
        } else {
            throw new BadRequestException(trans('exception.bad_request'));
        }
    }
}
