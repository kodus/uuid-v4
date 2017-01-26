Simple UUID v4 generator
========================

Simple static UUID v4 generator (PHP 7+ only).

## Usage

```php
<?php
use Kodus\Helpers\UUID;

require __DIR__ . '/vendor/autoload.php';

echo UUID::create() . "\n";
```