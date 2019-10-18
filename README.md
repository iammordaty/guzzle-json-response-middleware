# iammordaty/guzzle-json-response-middleware

Simple Guzzle 6.x JSON response middleware.

## Installation

```bash
$ composer require iammordaty/guzzle-json-response-middleware
```

## Requirements

* PHP 7.1

## Sample usage

```php
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleJsonResponseMiddleware\JsonResponseMiddleware;

$stack = HandlerStack::create();
$stack->push(new JsonResponseMiddleware(), JsonResponseMiddleware::NAME);

$client = new Client([ 'handler' => $stack ]);

$response = $client->get(/* */);
$contents = $response->getBody()->getJson();
```

## License

iammordaty/guzzle-json-response-middleware is licensed under the MIT License.
