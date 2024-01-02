# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

### Changed

### Fixed

### Removed

## [1.2.0] 2023-02-23

### Added

- Support for PHP version 8.1 and 8.2.
- Rector configuration for easy refactoring.
- Added PHP Mutation Testing.
- Contribution Guidelines and Code of Conduct.
- Security document explaining policy around security vulnerabilities and supported PHP versions.

### Changed

- Split GitHub Actions in separate workflow steps (mutation testing, code checks, testing, etc.).
- Updated copyright year.
- Upgraded Psalm to version 5.7.
- Upgraded Guzzle to version 7.4.
- Upgraded PHPStan to version 1.4.

### Fixed

- Various code style improvements and fixes.

### Removed

- PHP 7.4 Support.

## [1.1.0] 2022-01-16

### Added

- New function to get the reading observation by geolocation (latitude and longitude)
  . [\#4](https://github.com/azuyalabs/waqi/pull/4) ([mohdizzudin](https://github.com/mohdizzudin))
- Check that the response body contains a 'data' element. In certain situations this element is not always returned by
  the AQI API.
- Exception handling for the situation the station name is given but empty. An empty station name would result in an
  invalid call to the AQI API.

### Changed

- Upgrade to PHPUnit 8.
- Updated external dependencies.
- Introduced new PHP CS Fixer settings with upgraded PHP CS Fixer v3.
- Copyright year and e-mail address.
- Renamed the script for formatting code to a more concise name.
- Replaced FQN by use of imports.
- Dropped unnecessary arguments in some functions as they are the same as the default.
- Included conversion from `StreamInterface` to string when receiving the response from the HTTP client.
- Removed the 'Exception' part of the exception class names as it is superfluous.
- Replaced deprecated `Psr7\str` and `Psr7\copy_to_string` function calls.

### Fixed

- Visibility of fixture methods in the test class to '
  private'. [\#2](https://github.com/azuyalabs/waqi/pull/2) ([peter279k](https://github.com/peter279k))

### Removed

- Travis CI and Style CI in favour of GitHub Actions.
- Support for PHP 7.3.
- Throwing an exception as methods allows for a null value parameter.

## [1.0.1] 2018-10-31

### Added

- Added missing catch clause for `GuzzleException`.

### Changed

- The variables Temperature, Humidity and Barometric Pressure may now return a possible null value in case the
  monitoring station doesn't measure these.
- Minimum requirement for PHP to 7.1.0
- Updated package versions for PHPStan, Mockery and PHPUnit.
- Updated in-line documentation (various).

### Fixed

- Adjustment to the name of the monitoring station in case html entities are used.

### Removed

- Removed type casting as variables are already of proper data type.
- Removed invalid `syntaxCheck` parameter from the PHPUnit XML configuration.

## [1.0.0] 2017-02-15

- Initial release

[Unreleased]: https://github.com/azuyalabs/waqi/compare/1.2.0...HEAD
[1.2.0]: https://github.com/azuyalabs/waqi/compare/1.1.0...1.2.0
[1.1.0]: https://github.com/azuyalabs/waqi/compare/1.0.1...1.1.0
[1.0.1]: https://github.com/azuyalabs/waqi/compare/1.0.0...1.0.1
[1.0.0]: https://github.com/azuyalabs/waqi/releases/tag/1.0.0
