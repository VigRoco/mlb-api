<?php

namespace MlbApi\Models;

final readonly class People
{
    use ModelTrait;

    public function __construct(
        public int $id,
        public string $fullName,
        public string $firstName,
        public string $lastName,
        public string $link
    ) {}
}
