<?php

namespace VigRoco\MlbApi\Models;

class People extends Model
{
    public function __construct(
        int $id,
        public readonly string $fullName,
        public readonly string $firstName,
        public readonly string $lastName
    ) {
        parent::__construct($id);
    }
}
