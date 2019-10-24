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

$response = $client->get('http://www.mocky.io/v2/5db0b9312f00002901c13d8e');

// please note that the `getJson` method, excluding for the first one, accepts the same arguments
// as native PHP's `json_decode` function
$contents = $response->getBody()->getJson(true);

print_r($contents);

/*
Outputs:

Array
(
    [id] => 78349
    [name] => John Smith
    [username] => @smith
    [email] => hello@smith.com
    [phone] => +1-202-555-0192
    [website] => smith.dev
)
*/

```

## License

iammordaty/guzzle-json-response-middleware is licensed under the MIT License.
