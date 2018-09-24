kodus/uuid-v4
=============

Simple static UUID v4 generator/validator.

[![PHP Version](https://img.shields.io/badge/php-7.0%2B-blue.svg)](https://packagist.org/packages/kodus/uuid-v4)
[![Build Status](https://travis-ci.org/kodus/uuid-v4.svg?branch=master)](https://travis-ci.org/kodus/uuid-v4)

## Usage

Create and validate a formatted UUID v4:

```php
use Kodus\Helpers\UUID;

// create UUID v4:

$my_uuid = UUID::create();

// validate UUID v4:

assert(UUID::isValid($my_uuid));
```
