# Change Log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org).

## [Unreleased]

### Added

### Changed

### Fixed

### Removed


## [1.0.1] 2018-10-31

### Added
- Added missing catch clause for GuzzleException.

### Changed
- The variables Temperature, Humidity and Barometric Pressure may now return a possible null value in case the monitoring station doesn't measure these.
- Minimum requirement for PHP to 7.1.0
- Updated package versions for PHPStan, Mockery and PHPUnit.
- Updated inline documentation (various).
- 
### Fixed
- Adjustment to the name of the monitoring station in case html entities are used.

### Removed
- Removed type casting as variables are already of proper data type.
- Removed invalid syntaxCheck parameter from the PHPUnit XML configuration.


## [1.0.0] 2017-02-15
- Initial release
