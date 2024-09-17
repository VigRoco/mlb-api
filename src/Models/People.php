<?php

namespace MlbApi\Models;

class People
{
    use ModelTrait;

    public function __construct(
        public readonly int $id,
        public readonly string $fullName,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $link
    ) {}
}
