<?php

namespace MlbApi\Models;

class Venue extends Model
{
    public function __construct(
        int $id,
        public readonly string $name,
        public readonly bool $active,
        public readonly string $season
    ) {
        parent::__construct($id);
    }
}
