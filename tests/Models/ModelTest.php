<?php

declare(strict_types=1);

namespace MlbApi\Test\Models;

use MlbApi\Models\Model;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase {
    #[DataProvider("fromJsonDataProvider")]
    public function testFromJson(string $json, int $expectedId, ?string $error = null): void {
        if($error !== null) {
            $this->expectException($error);
        }

        $model = Model::fromJson($json);
        $this->assertEquals($expectedId, $model->id);
    }

    public static function fromJsonDataProvider(): iterable {
        return [
        yield "happy path" => [
            '{"id":1234}',
            1234
        ],
        yield "contains extra fields" => [
            '{"additional": 123, "id":1234, "name": "other value"}',
            1234
        ],
        yield "type error" => [
            '{"id":"1234"}',
            1234,
            "TypeError"
        ],
        yield "error" => [
            '{}',
            0,
            "ArgumentCountError"
        ]];
    }
}