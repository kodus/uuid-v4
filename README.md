kodus/uuid-v4
=============

Simple static UUID v4 generator/validator.

[![PHP Version](https://img.shields.io/badge/php-7.0%2B-blue.svg)](https://packagist.org/packages/kodus/uuid-v4)

## Usage

```php
use Kodus\Helpers\UUID;

// create UUID v4:

$my_uuid = UUID::create();

// validate UUID v4:

assert(UUID::isValid($my_uuid));

// pack/unpack UUID to 16-byte binary string:

$bytes = UUID::pack($my_uuid);

$uuid = UUID::unpack($bytes);
```
