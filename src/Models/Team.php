<?php

namespace MlbApi\Models;

class Team extends Model
{
    public function __construct(
        int $id,
        public readonly string $name,
        public readonly Venue $venue,
        public readonly string $abbreviation,

    ){
        parent::__construct($id);
    }
}
