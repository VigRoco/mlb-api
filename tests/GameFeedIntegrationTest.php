<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use VigRoco\MlbApi\Api\transformers\GameFeedTransformer;

class GameFeedIntegrationTest extends TestCase
{
    private Client $client;
    private GameFeedTransformer $transformer;

    public function setUp() : void
    {
        parent::setUp();

        $this->client = new Client([
            "base_uri" => "https://statsapi.mlb.com"
        ]);

        $this->transformer = new GameFeedTransformer();
    }

    public function testBasicUsage() {
        $response = $this->client->get("/api/v1.1/game/717813/feed/live");

        $gameFeed = ($this->transformer)($response);

        $this->assertNotEmpty($gameFeed);
        print_r($gameFeed);


    }
}
