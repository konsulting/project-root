# Project Root

A simple package to help with resolving paths when working in a composer package.

Specifically, for some functionality you may need to refer to the packages root 
directory, but then need to use the project's root when the package is included 
as a dependency.

Rather than keep repeating dirty logic from before, we can use this package.

## Installation

`composer require konsulting/package-root`

## Usage

```php
<?php

\Konsulting\ProjectRoot::forPackage('package-name')->resolve(__DIR__);

```

## Contributing

Contributions are welcome and will be fully credited. We will accept contributions by Pull Request.

Please:

* Use the PSR-2 Coding Standard
* Add tests, if you’re not sure how, please ask.
* Document changes in behaviour, including readme.md.

## Testing
We use [PHPUnit](https://phpunit.de)

Run tests using PHPUnit: `vendor/bin/phpunit`
