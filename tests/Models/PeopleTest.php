<?php

declare(strict_types=1);

namespace MlbApi\Test\Models;

use MlbApi\Models\People;
use PHPUnit\Framework\TestCase;

class PeopleTest extends TestCase {
    public function testPeopleSerializesFromJson(): void {
        $json = json_encode([
            "id" => 1234,
            "fullName" => "Full Name",
            "firstName" => "Full",
            "lastName" => "Name",
            "link" => "test.link.here"
        ]);

        $people = People::fromJson($json);

        $this->assertEquals("Full Name", $people->fullName);
    }
}