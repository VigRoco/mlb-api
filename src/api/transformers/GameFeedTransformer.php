<?php

namespace VigRoco\MlbApi\Api\Transformers;

use Psr\Http\Message\ResponseInterface;
use VigRoco\MlbApi\Api\TransformerInterface;
use VigRoco\MlbApi\Models\GameFeed;
use VigRoco\MlbApi\Models\Model;
use VigRoco\MlbApi\Models\People;
use VigRoco\MlbApi\Models\Team;
use VigRoco\MlbApi\Models\Venue;

class GameFeedTransformer implements TransformerInterface
{
    public function __invoke(ResponseInterface $response): Model
    {
        $bodyJson = json_decode($response->getBody()->getContents(), true);

        return $this->getGameFeed($bodyJson);
    }

    protected function getGameFeed(array $gameFeed): GameFeed
    {
        $venue = new Venue(
            $gameFeed["gameData"]["venue"]["id"],
            $gameFeed["gameData"]["venue"]["name"],
            $gameFeed["gameData"]["venue"]["active"],
            $gameFeed["gameData"]["venue"]["season"]
        );

        $players = array_map(function ($player) {
            return new People(
                $player["id"],
                $player["fullName"],
                $player["firstName"],
                $player["lastName"],
            );
        }, $gameFeed["gameData"]["players"]);

        $homeTeam = new Team(
            $gameFeed["gameData"]["teams"]["home"]["id"],
            $gameFeed["gameData"]["teams"]["home"]["name"],
            $venue,
            $gameFeed["gameData"]["teams"]["home"]["abbreviation"],
        );
        $awayTeam = new Team(
            $gameFeed["gameData"]["teams"]["away"]["id"],
            $gameFeed["gameData"]["teams"]["away"]["name"],
            $venue,
            $gameFeed["gameData"]["teams"]["away"]["abbreviation"],
        );

        return new GameFeed(
            $gameFeed["gamePk"],
            $players,
            $venue,
            $homeTeam,
            $awayTeam
        );
    }
}
