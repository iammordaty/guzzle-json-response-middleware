<?php

namespace GuzzleJsonResponseMiddleware;

use GuzzleHttp\Psr7\StreamDecoratorTrait;
use Psr\Http\Message\StreamInterface;

class JsonStream implements StreamInterface
{
    use StreamDecoratorTrait;

    /**
     * Returns decoded body contents. Except for the first one,
     * accepts the same arguments as PHP's json_decode function.
     *
     * @see json_decode() Parameters documentation
     * @link https://php.net/manual/en/function.json-decode.php
     *
     * @param bool $assoc
     * @param int $depth
     * @param int $options
     * @return mixed
     */
    public function getJson($assoc = false, int $depth = 512, $options = 0)
    {
        $contents = $this->getContents();
        $result = json_decode($contents, $assoc, $depth, $options);

        return $result;
    }
}
