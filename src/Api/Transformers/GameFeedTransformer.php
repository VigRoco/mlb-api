<?php

namespace MlbApi\Api\Transformers;

use Psr\Http\Message\ResponseInterface;
use MlbApi\Api\TransformerInterface;
use MlbApi\Models\GameFeed;
use MlbApi\Models\Model;
use MlbApi\Models\People;
use MlbApi\Models\Team;
use MlbApi\Models\Venue;

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

        $people_class_vars = get_class_vars(People::class);
        $players = array_map(function (array $player) use($people_class_vars) {
            return new People(
                ...array_intersect_key($player, $people_class_vars)
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
