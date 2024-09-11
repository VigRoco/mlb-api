<?php

namespace MlbApi\Models;

class People extends Model
{
    public function __construct(
        int $id,
        public readonly string $fullName,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $link
    ) {
        parent::__construct($id);
    }
}
