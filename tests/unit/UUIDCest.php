<?php

namespace Kodus\Test\Unit;

use Kodus\Helpers\UUID;
use UnitTester;

class UUIDCest
{
    const UUID_PATTERN = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';

    public function createRandomUUID(UnitTester $I)
    {
        $I->assertRegExp(self::UUID_PATTERN, UUID::create(), "sho nuff looks like a UUID, uh-huh");
    }
}
