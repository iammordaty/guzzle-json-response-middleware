<?php

namespace GuzzleJsonResponseMiddleware;

use Closure;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class JsonResponseMiddleware
{
    public const NAME = 'guzzle-json-response-middleware';

    public function __invoke(callable $handler): Closure
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            /** @var PromiseInterface $promise */
            $promise = $handler($request, $options);

            return $promise->then(function (ResponseInterface $response) {
                $body = new JsonStream($response->getBody());

                return $response->withBody($body);
            });
        };
    }
}
