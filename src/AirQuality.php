<?php

declare(strict_types = 1);

/**
 * This file is part of the 'azuyalabs/waqi' package.
 * A Simple PHP Wrapper for the World Air Quality Index API.
 *
 * Copyright (c) 2017 - 2024 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me at sachatelgenhof dot com>
 */

namespace Azuyalabs\WAQI;

use Azuyalabs\WAQI\Exceptions\InvalidAccessToken;
use Azuyalabs\WAQI\Exceptions\QuotaExceeded;
use Azuyalabs\WAQI\Exceptions\UnknownStation;

interface AirQuality
{
    /**
     * Retrieves the real-time Air Quality Index observation monitoring station name (or city name).
     *
     * If the $station argument is left out, the Air Quality Index observation is obtained of the nearest monitoring
     * station close to the user location (based on the user's public IP address)
     *
     * @param ?string $station name of the monitoring station (or city name). This parameter can be left blank to get
     *                         the observation of the nearest monitoring station close to the user location (based on
     *                         the  user's public IP address)
     *
     * @throws QuotaExceeded
     * @throws InvalidAccessToken
     * @throws UnknownStation
     */
    public function getObservationByStation(?string $station = null): void;

    /**
     * Retrieves the real-time Air Quality Index observation monitoring station name (or city name)
     * by the given geographical coordinates.
     *
     * @throws QuotaExceeded
     * @throws InvalidAccessToken
     * @throws UnknownStation
     */
    public function getObservationByGeoLocation(float $latitude, float $longitude): void;

    /**
     * Returns information about the Air Quality Index measured at this monitoring station at the time of measurement.
     *
     * The array returned contains 4 elements:
     *  - 'aqi': the AQI level (which is defined by the monitoring stations' dominant pollution type)
     *  - 'pollution_level': a narrative describing the air pollution level
     *  - 'health_implications': a narrative describing the health implications associated with the measured pollution
     *                           level
     *  - 'cautionary_statement': a cautionary statement associated with the measured pollution level (only for PM2.5)
     *
     * @return array{aqi: float, pollution_level: string, health_implications: string, cautionary_statement: string} structure containing the Air Quality Index measured at this monitoring station at
     *                                                                                                               the time of measurement
     */
    public function getAQI(): array;

    /**
     * Returns the date/time the last measurement was taken.
     *
     * @return \DateTime the date/time the last measurement was taken
     *
     * @throws \Exception
     */
    public function getMeasurementTime(): \DateTime;

    /**
     * Returns information about this monitoring station.
     *
     * The array returned contains 4 elements:
     *  - 'id': the unique ID for this monitoring station
     *  - 'name': the name (or description) of this monitoring station
     *  - 'coordinates': the geographical coordinates of this monitoring station ('longitude' and 'latitude')
     *  - 'url': the URL of this monitoring station
     *
     * @return array{id: int, name: string, coordinates: array{latitude: float, longitude: float}, url: string} structure containing information about this monitoring station
     */
    public function getMonitoringStation(): array;

    /**
     * Returns a list of EPA attributions for this monitoring station.
     *
     * A list of one or more attributions is returned, of which each contains a name and a URL attribute.
     *
     * @return array<string, string> list of EPA attributions for this monitoring station
     *
     * @throws \JsonException
     */
    public function getAttributions(): array;

    /**
     * Returns the humidity (in %) measured at this monitoring station at the time of measurement.
     *
     * @return float|null the humidity (in %) measured at this monitoring station at the time of measurement.
     *                    If the monitoring station does not measure humidity levels, a 'null' value is returned.
     */
    public function getHumidity(): ?float;

    /**
     * Returns the temperature (in degrees Celsius) measured at this monitoring station at the time of measurement.
     *
     * @return float|null the temperature (in degrees Celsius) measured at this monitoring station at the time of
     *                    measurement. If the monitoring station does not measure temperature levels, a 'null' value is
     *                    returned.
     */
    public function getTemperature(): ?float;

    /**
     * Returns the barometric pressure (in millibars) measured at this monitoring station at the time of measurement.
     *
     * @return float|null the barometric pressure (in millibars) measured at this monitoring station at the time of
     *                    measurement. If the monitoring station does not barometric pressure levels, a 'null' value
     *                    is returned.
     */
    public function getPressure(): ?float;

    /**
     * Returns the carbon monoxide (CO) level measured at this monitoring station at the time of measurement.
     *
     * CO concentration levels are typically expressed in Parts per million (PPM) or density, however the World Air
     * Quality levels is using the US EPA 0-500 AQI scale.
     *
     * @return float|null the carbon monoxide (CO) level measured at this monitoring station at the time of measurement.
     *                    If the monitoring station does not measure PM10 levels, a 'null' value is returned.
     */
    public function getCO(): ?float;

    /**
     * Returns the nitrogen dioxide (NO2) level measured at this monitoring station at the time of measurement.
     *
     * NO2 concentration levels are typically expressed in Parts per million (PPM) or density, however the World Air
     * Quality levels is using the US EPA 0-500 AQI scale.
     *
     * @return float|null the nitrogen dioxide (NO2) level measured at this monitoring station at the time of
     *                    measurement. If the monitoring station does not measure PM10 levels, a 'null' value is
     *                    returned.
     */
    public function getNO2(): ?float;

    /**
     * Returns the ozone (O3) level measured at this monitoring station at the time of measurement.
     *
     * O3 concentration levels are typically expressed in Parts per million (PPM) or density, however the World Air
     * Quality levels is using the US EPA 0-500 AQI scale.
     *
     * @return float|null the ozone (O3) level measured at this monitoring station at the time of measurement. If the
     *                    monitoring station does not measure PM10 levels, a 'null' value is returned
     */
    public function getO3(): ?float;

    /**
     * Returns the level of respirable particulate matter, 10 micrometers or fewer (PM10), measured at this monitoring
     * station at the time of measurement.
     *
     * PM10 levels are typically expressed in Parts per million (PPM) or density, however the World Air
     * Quality levels is using the US EPA 0-500 AQI scale.
     *
     * @return float|null the level of particulate matter 10 micrometers or fewer (PM10), measured at this monitoring
     *                    station at the time of measurement. If the monitoring station does not measure PM10 levels,
     *                    a 'null' value is returned
     */
    public function getPM10(): ?float;

    /**
     * Returns the level of fine particulate matter, 2.5 micrometers or fewer (PM2.5), measured at this monitoring
     * station at the time of measurement.
     *
     * PM2.5 levels are typically expressed in Parts per million (PPM) or density, however the World Air
     * Quality levels is using the US EPA 0-500 AQI scale.
     *
     * @return float|null the level of particulate matter 2.5 micrometers or fewer (PM2.5), measured at this monitoring
     *                    station at the time of measurement. If the monitoring station does not measure PM10 levels,
     *                    a 'null' value is returned
     */
    public function getPM25(): ?float;

    /**
     * Returns the sulfur dioxide (SO2) level measured at this monitoring station at the time of measurement.
     *
     * SO2 concentration levels are typically expressed in Parts per million (PPM) or density, however the World Air
     * Quality levels is using the US EPA 0-500 AQI scale.
     *
     * @return float|null the sulfur dioxide (SO2) level measured at this monitoring station at the time of measurement.
     *                    If the monitoring station does not measure PM10 levels, a 'null' value is returned
     */
    public function getSO2(): ?float;

    /**
     * Returns the name of the primary pollutant at this monitoring station at the time of measurement.
     *
     * For example if the primary pollutant is PM2.5, the value of 'pm25' will be returned.
     *
     * @return string name of the primary pollutant at this monitoring station at the time of measurement
     */
    public function getPrimaryPollutant(): string;
}
