<?php

namespace Kodus\Test\Unit;

use Kodus\Helpers\UUID;
use UnitTester;

class UUIDCest
{
    public function validateUUIDv4(UnitTester $I)
    {
        $I->assertTrue(UUID::isValid("afbc8a93-ebc4-41cc-9204-bb52a7534a55"));
        $I->assertTrue(UUID::isValid("0b886549-8c57-43dd-8d2c-23dce95bb790"));

        $I->assertFalse(UUID::isValid("b886549-8c57-43dd-8d2c-23dce95bb79a")); // missing first
        $I->assertFalse(UUID::isValid("0b886549-8c57-43dd-8d2c-23dce95bb79")); // missing last
        $I->assertFalse(UUID::isValid("b886549-8c57-43dd-23dce95bb79a")); // missing group
        $I->assertFalse(UUID::isValid("0b886549-8c57-43dd-8d2c-23dce95bb7901")); // junk at end
        $I->assertFalse(UUID::isValid("10b886549-8c57-43dd-8d2c-23dce95bb790")); // junk at start
        $I->assertFalse(UUID::isValid("5be01114-2bee-11e7-93ae-92361f002671")); // UUID v1
        $I->assertFalse(UUID::isValid("0b8865498c5743dd8d2c23dce95bb790")); // missing dashes
    }

    public function createRandomUUID(UnitTester $I)
    {
        $uuid = UUID::create();

        $I->assertTrue(UUID::isValid($uuid));
    }

    public function packAndUnpackUUID(UnitTester $I)
    {
        $uuids = [
            "afbc8a93-ebc4-41cc-9204-bb52a7534a55",
            "00000000-0000-4000-8000-000000000000",
            "ffffffff-ffff-4fff-bfff-ffffffffffff",
            "0b886549-8c57-43dd-8d2c-23dce95bb790",
        ];

        foreach ($uuids as $uuid) {
            $bytes = UUID::pack($uuid);

            $I->assertSame($uuid, UUID::unpack($bytes));
        }
    }
}
