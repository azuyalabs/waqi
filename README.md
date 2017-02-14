# A simple PHP Wrapper for the World Quality Index API

The [World Air Quality Index](http://waqi.info) project is an initiative to map the current and real-time air quality 
around the globe. The Air Quality indexes are based on PM2.5, PM10, Ozone, NO2, SO2 and CO hourly measurements 
provided by various monitoring stations in the world. 

This packages makes it easy to retrieve the Air Quality Index for your area and is based on the a real-time Air Quality 
data feed (API) of the WAQI project.

Note: To make use of this package (and the underlying AQI API) an access token is required. You can acquire your 
token here: https://aqicn.org/data-platform/token.

## Installation

You can pull in this package via composer:

``` bash
$ composer require azuyalabs/waqi
```

## Usage
Start with including the Composer autoload file in your project:
```php
<?php
require 'vendor/autoload.php';
```
Then, using your AQI access token, create an instance of the WAQI object:
 
```php
$waqi = new WAQI(<your access token>);
``` 
 
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed.

## Testing
This package comes with a [PHPUnit](https://phpunit.de) test suite. To run the tests, run the following command
from the project directory:

``` bash
$ composer test
```

or alternatively run with:

``` bash
$ vendor/bin/phpunit
```

## Credits

- [Sacha Telgenhof](https://github.com/stelgenhof)
- [All contributors](../../contributors)

## License

This package is open-sourced software licensed under the MIT License. Please see [LICENSE](LICENSE) for more information.
