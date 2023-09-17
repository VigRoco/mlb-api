<?php

namespace VigRoco\MlbApi\Api;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

final class Api
{
    public function __construct(
        private readonly ClientInterface $client,
        private readonly UriInterface $uri
    ) {
    }

    public function get(int $id, RequestInterface $request): ResponseInterface {

        return $this->client->sendRequest($request->withUri($this->uri));
    }
}
