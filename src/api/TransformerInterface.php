<?php

namespace VigRoco\MlbApi\Api;

use Psr\Http\Message\ResponseInterface;
use VigRoco\MlbApi\Models\Model;

interface TransformerInterface
{
    public function __invoke(ResponseInterface $response): Model;
}
