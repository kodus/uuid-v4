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

    const UUID_FORMAT = '%02x%02x%02x%02x-%02x%02x-%02x%02x-%02x%02x-%02x%02x%02x%02x%02x%02x';

    /**
     * Creates a new, random UUID v4
     *
     * @return string formatted UUID v4
     */
    public static function create(): string
    {
        $bytes = unpack('C*', random_bytes(16));

        return sprintf(self::UUID_FORMAT,
            $bytes[1], $bytes[2], $bytes[3], $bytes[4],
            $bytes[5], $bytes[6],
            $bytes[7] & 0x0f | 0x40, $bytes[8],
            $bytes[9] & 0x3f | 0x80, $bytes[10],
            $bytes[11], $bytes[12], $bytes[13], $bytes[14], $bytes[15], $bytes[16]
        );
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
