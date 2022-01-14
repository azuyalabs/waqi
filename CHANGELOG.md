# Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres
to [Semantic Versioning](http://semver.org).

## [Unreleased]

### Added

- New function to get the reading observation by geolocation (latitude and longitude)
  . [\#4](https://github.com/azuyalabs/waqi/pull/4) ([mohdizzudin](https://github.com/mohdizzudin))
- Check that the response body contains a 'data' element. In certain situations this element is not always returned by
  the AQI API.
- Exception handling for the situation the station name is given but empty. An empty station name would result in an
  invalid call to the AQI API.

### Changed

- Upgrade to PHPUnit 8.
- Updated third party dependencies.
- Introduced new PHP CS Fixer settings with upgraded PHP CS Fixer v3.
- Copyright year and e-mail address.
- Renamed the script for formatting code to a more concise name.
- Replaced FQN by use of imports.
- Dropped unnecessary arguments in some functions as they are the same as the default.
- Included conversion from StreamInterface to string when receiving the response from the HTTP client.
- Removed the 'Exception' part of the exception class names as it is superfluous.
- Replaced deprecated `Psr7\str` function calls.

### Fixed

- Visibility of fixture methods in the test class to '
  private'. [\#2](https://github.com/azuyalabs/waqi/pull/2) ([peter279k](https://github.com/peter279k))

### Removed

- Throwing an exception as methods allows for a null value parameter.
- Travis CI and StyleCI in favour of GitHub Actions.
- Support for PHP 7.3.

## [1.0.1] 2018-10-31

### Added

- Added missing catch clause for GuzzleException.

### Changed

- The variables Temperature, Humidity and Barometric Pressure may now return a possible null value in case the
  monitoring station doesn't measure these.
- Minimum requirement for PHP to 7.1.0
- Updated package versions for PHPStan, Mockery and PHPUnit.
- Updated inline documentation (various).

### Fixed

- Adjustment to the name of the monitoring station in case html entities are used.

### Removed

- Removed type casting as variables are already of proper data type.
- Removed invalid syntaxCheck parameter from the PHPUnit XML configuration.

## [1.0.0] 2017-02-15

- Initial release
