[![GitHub Release](https://img.shields.io/github/release/azuyalabs/waqi.svg?style=flat-square)](https://github.com/azuyalabs/waqi/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![CodeCheck](https://github.com/azuyalabs/waqi/workflows/Validate/badge.svg)](https://github.com/azuyalabs/waqi/actions)

# A simple PHP Wrapper for the World Air Quality Index API

The [World Air Quality Index](http://waqi.info) project is an initiative to map the current and real-time air quality
around the globe. The Air Quality indexes are based on PM2.5, PM10, Ozone, NO2, SO2 and CO hourly measurements provided
by various monitoring stations in the world.

This packages makes it easy to retrieve the Air Quality Index for your area and is based on the real-time Air Quality
data feed (API) of the WAQI project.

Note: To make use of this package (and the underlying AQI API) an access token is required. You can acquire your token
here: [https://aqicn.org/data-platform/token.](https://aqicn.org/data-platform/tokeni).

## System Requirements

You need *PHP >= 8.0* to use `azuyalabs/waqi`.

## Installation

You can pull in this package via composer:

``` shell
composer require azuyalabs/waqi
```

## Usage

Start with including the Composer `autoload` file in your project:

```php
<?php
require 'vendor/autoload.php';
```

Using your AQI access token, create an instance of the WAQI object:

```php
use Azuyalabs\WAQI\WAQI;

$waqi = new WAQI(<your access token>);
```

Next, use the `getObservationByStation` method with the desired city or monitoring station name (e.g.
'new york'). This will obtain the latest air quality observations:

``` php
$waqi->getObservationByStation('new york');
```

### Air Quality

If all goes well, use the various API methods to get details about the retrieved Air Quality Index of the chosen city or
monitoring station.

To get the AQI (Air Quality Index), use the method `getAQI`:

``` php
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

In addition to the general Air Quality Information, specific pollutant level information is available as well. Be aware
that not every monitoring station captures all pollutant types, so some of these API functions may return 'null'.

The following API functions are available to get specific pollutant level information:

- `getCO()`: returns the carbon monoxide (CO) level measured at the monitoring station at the time of measurement.
- `getNO2()`: returns the nitrogen dioxide (NO2) level measured at the monitoring station at the time of measurement.
- `getO3()`: returns the ozone (O3) level measured at the monitoring station at the time of measurement.
- `getSO2()`: returns the sulfur dioxide (SO2) level measured at the monitoring station at the time of measurement.
- `getPM10()`: returns the level of particulate matter 10 micrometers or lower (PM10), measured at this monitoring
  station at the time of measurement.
- `getPM25()`: returns the level of particulate matter 2.5 micrometers or lower (PM2.5), measured at this monitoring
  station at the time of measurement.

### Monitoring Station

Information about the monitoring station can be obtained through two API methods.

First, using the API method `getMonitoringStation()`, will return information about the given monitoring station:

- 'id': the unique ID for this monitoring station
- 'name': the name (or description) of this monitoring station
- 'coordinates': the geographical coordinates of this monitoring station (array of 'longitude' and 'latitude')
- 'url': the URL of this monitoring station

Secondly, the API method `getAttributions()` will return a list of EPA attributions for this monitoring station.

### Other

Other API methods that provide additional information, are:

- `getMeasurementTime()`: returns the date/time the last measurement was taken. (as a `DateTime` object).
- `getHumidity()`: returns the humidity (in %) measured at this monitoring station at the time of measurement.
- `getTemperature()`: returns the temperature (in degrees Celsius) measured at this monitoring station at the time of
  measurement.
- `getPressure()`: returns the barometric pressure (in millibars) measured at this monitoring station at the time of
  measurement.
- `getPrimaryPollutant()`: returns the name of the primary pollutant at this monitoring station at the time of
  measurement (e.g. 'pm25').

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed.

## Testing

This package comes with a [PHPUnit](https://phpunit.de) test suite. To run the tests, run the following command from the
project directory:

``` shell
composer test
```

,or alternatively run with:

``` shell
vendor/bin/phpunit
```

## Contributing

Contributions are encouraged and welcome; I am always happy to get feedback or pull requests on GitHub :)
Create [GitHub Issues](https://github.com/azuyalabs/waqi/issues) for bugs and new features and comment on the ones you
are interested in.

If you enjoy what I am making, an extra cup of coffee is very much appreciated :). Your support helps me to put more
time into Open-Source Software projects like this.

<a href="https://www.buymeacoffee.com/sachatelgenhof" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: auto !important;width: auto !important;" ></a>

## Credits

- [Sacha Telgenhof](https://github.com/stelgenhof)
- [All contributors](../../contributors)

## License

This package is open-sourced software licensed under the MIT License. Please see [LICENSE](LICENSE) for more
information.
