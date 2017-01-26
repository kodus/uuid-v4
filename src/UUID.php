<?php

namespace Kodus\Helpers;

/**
 * This helper generates random version 4 UUIDs
 *
 * @link https://en.wikipedia.org/wiki/Universally_unique_identifier
 */
abstract class UUID
{
    /**
     * @type string path to the dev/urandom device on Linux
     */
    const DEV_URANDOM = '/dev/urandom';

    /**
     * Creates a new, random UUID v4
     *
     * @return string UUID v4
     */
    public static function create()
    {
        $r = unpack('v*', random_bytes(16));

        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            $r[1], $r[2], $r[3], $r[4] & 0x0fff | 0x4000,
            $r[5] & 0x3fff | 0x8000, $r[6], $r[7], $r[8]);
    }
}
