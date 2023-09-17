<?php

namespace VigRoco\MlbApi\Models;

class GameFeed extends Model
{
    public function __construct(
        int $id,
        public readonly array $players,
        public readonly Venue $venue,
        public readonly Team $homeTeam,
        public readonly Team $awayTeam
    ) {
        parent::__construct($id);
    }
}
