<?php

namespace Kodus\Test\Unit;

use Kodus\Helpers\UUID;
use UnitTester;

class UUIDCest
{
    public function validateUUIDv4(UnitTester $I)
    {
        $I->assertTrue(UUID::isValid("afbc8a93-ebc4-41cc-9204-bb52a7534a55"));
        $I->assertTrue(UUID::isValid("0B886549-8C57-43DD-8D2C-23DCE95BB790"));

        $I->assertFalse(UUID::isValid("B886549-8C57-43DD-8D2C-23DCE95BB79A")); // missing first
        $I->assertFalse(UUID::isValid("0B886549-8C57-43DD-8D2C-23DCE95BB79")); // missing last
        $I->assertFalse(UUID::isValid("B886549-8C57-43DD-23DCE95BB79A")); // missing group
        $I->assertFalse(UUID::isValid("0B886549-8C57-43DD-8D2C-23DCE95BB7901")); // junk at end
        $I->assertFalse(UUID::isValid("10B886549-8C57-43DD-8D2C-23DCE95BB790")); // junk at start
        $I->assertFalse(UUID::isValid("5be01114-2bee-11e7-93ae-92361f002671")); // UUID v1
        $I->assertFalse(UUID::isValid("0B8865498C5743DD8D2C23DCE95BB790")); // missing dashes
    }

    public function createRandomUUID(UnitTester $I)
    {
        $uuid = UUID::create();

        $I->assertTrue(UUID::isValid($uuid));
    }
}
