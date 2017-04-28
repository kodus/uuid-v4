<?php

namespace Kodus\Helpers;

/**
 * This helper generates random version 4 UUIDs
 *
 * @link https://en.wikipedia.org/wiki/Universally_unique_identifier
 */
abstract class UUID
{
    const UUID_V4_PATTERN = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';

    /**
     * Creates a new, random UUID v4
     *
     * @return string UUID v4
     */
    public static function create(): string
    {
        $r = unpack('v*', random_bytes(16));

        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            $r[1], $r[2], $r[3], $r[4] & 0x0fff | 0x4000,
            $r[5] & 0x3fff | 0x8000, $r[6], $r[7], $r[8]);
    }

    /**
     * Validates a given string as UUID v4
     *
     * @return bool TRUE, if the given string is a valid UUID v4 identifier
     */
    public static function isValid(string $uuid): bool
    {
        return preg_match(self::UUID_V4_PATTERN, $uuid) === 1;
    }
}
