<?php

namespace MlbApi\Api;

use Psr\Http\Message\ResponseInterface;
use MlbApi\Models\Model;

interface TransformerInterface
{
    public function __invoke(ResponseInterface $response): Model;
}
