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
Using your AQI access token, create an instance of the WAQI object:
 
```php
$waqi = new WAQI(<your access token>);
``` 

Next, use the `getObservationByStation` method with the desired city or monitoring station name (e.g. 
'new york'). This will obtain the latest air quality observations:

```php
$waqi->getObservationByStation('new york');
``` 
 
If all goes well, use the various API methods to get details about the retrieved Air Quality Index of the chosen
city or monitoring station.

To get the AQI (Air Quality Index), use the method `getAQI`:

```php
$waqi->getAQI();
``` 
 
This returns an array structure containing the Air Quality Index measured at this monitoring station at the time of
 measurement. It contains 4 elements:
 - 'aqi': the AQI level (which is defined by the monitoring stations' dominant pollution type)
 - 'pollution_level': a narrative describing the air pollution level
 - 'health_implications': a narrative describing the health implications associated with the measured pollution level
 - 'cautionary_statement': a cautionary statement associated with the measured pollution level (only for PM2.5)
 
Example output (for 'New York'):
```
 - 'aqi': 15
 - 'pollution_level': Good
 - 'health_implications': Air quality is considered satisfactory, and air pollution poses little or no risk.
 - 'cautionary_statement': None
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
