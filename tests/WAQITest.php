<?php

declare(strict_types = 1);

/**
 * This file is part of the 'WAQI (World Air Quality Index)' package.
 *
 * Simple PHP Wrapper for the World Air Quality Index API.
 *
 * Copyright (c) 2017 - 2024 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me at sachatelgenhof dot com>
 */

namespace Azuyalabs\WAQI\Test;

use Azuyalabs\WAQI\AirQuality;
use Azuyalabs\WAQI\Exceptions\InvalidAccessToken;
use Azuyalabs\WAQI\Exceptions\QuotaExceeded;
use Azuyalabs\WAQI\Exceptions\UnknownStation;
use Faker\Factory;
use Faker\Generator;
use Mockery\LegacyMockInterface;
use PHPUnit\Framework\TestCase;

class WAQITest extends TestCase
{
    private LegacyMockInterface $waqi;

    private Generator $faker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();
        $this->waqi = \Mockery::mock(AirQuality::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        \Mockery::close();

        unset($this->faker, $this->waqi);
    }

    /**
     * Tests that a valid temperature value is returned.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getTemperature()
     */
    public function should_get_temperature(): void
    {
        $this->assertPollutantLevel('getTemperature', $this->faker->randomFloat(2, -100, 100));
    }

    /**
     * Tests that a valid barometric pressure value is returned.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getPressure()
     */
    public function should_get_pressure(): void
    {
        $this->assertPollutantLevel('getPressure', $this->faker->randomFloat(2, -800, 1100));
    }

    /**
     * Tests that a valid humidity value is returned.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getHumidity()
     */
    public function should_get_humidity(): void
    {
        $this->assertPollutantLevel('getHumidity', $this->faker->randomFloat(2, -800, 1100));
    }

    /**
     * Tests that a valid value for the fine particulate matter, 2.5 micrometers or lower (PM2.5), is returned.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getPM25()
     */
    public function should_get_p_m25(): void
    {
        $this->assertPollutantLevel('getPM25', $this->faker->randomFloat(2, 0, 500));
    }

    /**
     * Tests that a null value for the respirable particulate matter, 2.5 micrometers or lower (PM2.5), is returned,
     * in the situation that a monitoring station does not provide a PM2.5 reading.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getPM25()
     */
    public function should_get_null_if_no_p_m25(): void
    {
        $this->assertNoPollutantReading('getPM25');
    }

    /**
     * Tests that a valid value for the respirable particulate matter, 10 micrometers or lower (PM10), is returned.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getPM10()
     */
    public function should_get_p_m10(): void
    {
        $this->assertPollutantLevel('getPM10', $this->faker->randomFloat(2, 0, 500));
    }

    /**
     * Tests that a null value for the respirable particulate matter, 10 micrometers or lower (PM10), is returned,
     * in the situation that a monitoring station does not provide a PM10 reading.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getPM10()
     */
    public function should_get_null_if_no_p_m10(): void
    {
        $this->assertNoPollutantReading('getPM10');
    }

    /**
     * Tests that a valid CO (carbon monoxide) value is returned.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getCO()
     */
    public function should_get_co(): void
    {
        $this->assertPollutantLevel('getCO', $this->faker->randomFloat(2, 0, 500));
    }

    /**
     * Tests that a valid CO (carbon monoxide) value is returned, in the situation that a monitoring station does not
     * provide a CO reading.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getCO()
     */
    public function should_get_null_if_no_co(): void
    {
        $this->assertNoPollutantReading('getCO');
    }

    /**
     * Tests that a valid NO2 (nitrogen dioxide) value is returned.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getNO2()
     */
    public function should_get_n_o2(): void
    {
        $this->assertPollutantLevel('getNO2', $this->faker->randomFloat(2, 0, 500));
    }

    /**
     * Tests that a valid NO2 (nitrogen dioxide) value is returned, in the situation that a monitoring station does not
     * provide a NO2 reading.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getNO2()
     */
    public function should_get_null_if_no_n_o2(): void
    {
        $this->assertNoPollutantReading('getNO2');
    }

    /**
     * Tests that a valid O3 (ozone) value is returned.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getO3()
     */
    public function should_get_o3(): void
    {
        $this->assertPollutantLevel('getO3', $this->faker->randomFloat(2, 0, 500));
    }

    /**
     * Tests that a valid O3 (ozone) value is returned, in the situation that a monitoring station does not
     * provide an O3 reading.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getO3()
     */
    public function should_get_null_if_no_o3(): void
    {
        $this->assertNoPollutantReading('getO3');
    }

    /**
     * Tests that a valid SO2 (sulfur dioxide) value is returned.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getSO2()
     */
    public function should_get_s_o2(): void
    {
        $this->assertPollutantLevel('getSO2', $this->faker->randomFloat(2, 0, 500));
    }

    /**
     * Tests that a valid SO2 (sulfur dioxide) value is returned, in the situation that a monitoring station does not
     * provide a SO2 reading.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getSO2()
     */
    public function should_get_null_if_no_s_o2(): void
    {
        $this->assertNoPollutantReading('getSO2');
    }

    /**
     * Tests that a valid measurement time value is returned.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getMeasurementTime()
     *
     * @throws \Exception
     */
    public function should_get_measurement_time(): void
    {
        $expectedValue = \DateTimeImmutable::createFromMutable($this->faker->dateTime());

        $this->waqi->shouldReceive('getMeasurementTime')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedValue);

        $result = $this->waqi->getMeasurementTime();

        $this->assertEquals($expectedValue, $result);
        $this->assertNotEmpty($result);
        $this->assertNotNull($result);
    }

    /**
     * Tests that a valid array is returned that represents the monitoring station information.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getMonitoringStation()
     */
    public function should_get_monitoring_station_information(): void
    {
        $expectedValue = [
            'id' => $this->faker->randomDigitNotNull(),
            'name' => $this->faker->text(50),
            'coordinates' => [
                'latitude' => $this->faker->latitude(),
                'longitude' => $this->faker->longitude(),
            ],
            'url' => $this->faker->url(),
        ];

        $this->waqi->shouldReceive('getMonitoringStation')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedValue);

        $result = $this->waqi->getMonitoringStation();

        $this->assertValue($result, $expectedValue, 'array');

        foreach (['id' => 'int', 'name' => 'string', 'url' => 'string', 'coordinates' => 'array'] as $name => $type) {
            $this->assertValue($result[$name], $expectedValue[$name], $type);
        }

        $this->assertValue($result['coordinates']['longitude'], $expectedValue['coordinates']['longitude'], 'float');
        $this->assertValue($result['coordinates']['latitude'], $expectedValue['coordinates']['latitude'], 'float');
    }

    /**
     * Tests that a valid array is returned that represents the Air Quality Index information.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getAQI()
     */
    public function should_get_aqi_information(): void
    {
        $expectedValue = [
            'aqi' => $this->faker->randomFloat(2, 0, 500),
            'pollution_level' => $this->faker->text(50),
            'health_implications' => $this->faker->text(150),
            'cautionary_statement' => $this->faker->text(150),
        ];

        $this->waqi->shouldReceive('getAQI')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedValue);

        $result = $this->waqi->getAQI();

        $this->assertValue($result, $expectedValue, 'array');

        foreach (['aqi' => 'float', 'pollution_level' => 'string', 'health_implications' => 'string', 'cautionary_statement' => 'string'] as $name => $type) {
            $this->assertValue($result[$name], $expectedValue[$name], $type);
        }
    }

    /**
     * Tests that a valid value for the primary pollutant is returned.
     *
     * @test
     *
     * @covers \Azuyalabs\WAQI\WAQI::getPrimaryPollutant()
     */
    public function should_get_primary_pollutant(): void
    {
        $expectedValue = $this->faker->randomElement(['pm25', 'pm10', 'co', 'no2', 'o3', 'so2']);

        $this->waqi->shouldReceive('getPrimaryPollutant')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedValue);

        $result = $this->waqi->getPrimaryPollutant();

        $this->assertValue($result, $expectedValue, 'string');
    }

    /**
     * Tests that an UnknownStation Exception for getObservationByStation is thrown if an unknown monitoring station name is given upon get the
     * stations' real-time observation.
     *
     * @test
     */
    public function should_raise_exception_when_unknown_station_name_by_station(): void
    {
        $this->expectException(UnknownStation::class);
        $station = 'xxxx';

        $this->waqi->shouldReceive('getObservationByStation')
            ->once()
            ->with($station)
            ->andThrow(UnknownStation::class);

        try {
            $this->waqi->getObservationByStation($station);
        } catch (InvalidAccessToken|QuotaExceeded) {
        }
    }

    /**
     * Tests that a QuotaExceeded Exception for getObservationByStation is thrown when the API quota has been exceeded.
     * The default quota is maximum 1000 (thousand) requests per minute.
     *
     * @test
     */
    public function should_raise_exception_when_quota_exceeded_by_station(): void
    {
        $this->expectException(QuotaExceeded::class);
        $station = $this->faker->city();

        $this->waqi->shouldReceive('getObservationByStation')
            ->once()
            ->with($station)
            ->andThrow(QuotaExceeded::class);

        try {
            $this->waqi->getObservationByStation($station);
        } catch (InvalidAccessToken|UnknownStation) {
        }
    }

    /**
     * Tests that an InvalidAccessToken Exception for getObservationByStation is thrown when an invalid access token is provided
     * The default quota is maximum 1000 (thousand) requests per minute.
     *
     * @test
     */
    public function should_raise_exception_when_invalid_token_by_station(): void
    {
        $this->expectException(InvalidAccessToken::class);
        $station = $this->faker->city();

        $this->waqi->shouldReceive('getObservationByStation')
            ->once()
            ->with($station)
            ->andThrow(InvalidAccessToken::class);

        try {
            $this->waqi->getObservationByStation($station);
        } catch (QuotaExceeded|UnknownStation) {
        }
    }

    /**
     * Tests that a QuotaExceeded Exception for getObservationByGeoLocation is thrown when the API quota has been exceeded.
     * The default quota is maximum 1000 (thousand) requests per minute.
     *
     * @test
     *
     * @throws InvalidAccessToken|UnknownStation
     */
    public function should_raise_exception_when_quota_exceeded_by_geo_location(): void
    {
        $this->expectException(QuotaExceeded::class);

        $latitude = $this->faker->latitude();
        $longitude = $this->faker->longitude();

        $this->waqi->shouldReceive('getObservationByGeoLocation')
            ->once()
            ->with($latitude, $longitude)
            ->andThrow(QuotaExceeded::class);

        $this->waqi->getObservationByGeoLocation($latitude, $longitude);
    }

    /**
     * Tests that an InvalidAccessToken Exception for getObservationByGeoLocation is thrown when an invalid access token is provided
     * The default quota is maximum 1000 (thousand) requests per minute.
     *
     * @test
     *
     * @throws QuotaExceeded|UnknownStation
     */
    public function should_raise_exception_when_invalid_token_by_geo_location(): void
    {
        $this->expectException(InvalidAccessToken::class);

        $latitude = $this->faker->latitude();
        $longitude = $this->faker->longitude();

        $this->waqi->shouldReceive('getObservationByGeoLocation')
            ->once()
            ->with($latitude, $longitude)
            ->andThrow(InvalidAccessToken::class);

        $this->waqi->getObservationByGeoLocation($latitude, $longitude);
    }

    /**
     * Performs basic assertions on a result value.
     *
     * @param mixed  $result        the value to be asserted
     * @param mixed  $expectedValue the expected value
     * @param string $type          the internal type representing the given value (e.g. 'int', 'string', etc.)
     */
    private function assertValue(mixed $result, mixed $expectedValue, string $type): void
    {
        $this->assertEquals($expectedValue, $result);
        $this->{'assertIs' . \ucfirst($type)}($result);
        $this->assertNotEmpty($result);
        $this->assertNotNull($result);
    }

    /**
     * Performs basic assertions on a pollutant level value.
     *
     * @param string $method        the class method that obtains the pollutant level value
     * @param float  $expectedValue the expected value the provided method should be
     */
    private function assertPollutantLevel(string $method, float $expectedValue): void
    {
        $this->waqi->shouldReceive($method)
            ->once()
            ->withNoArgs()
            ->andReturn($expectedValue);

        $result = $this->waqi->$method();

        $this->assertValue($result, $expectedValue, 'float');
    }

    /**
     * Performs assertions for monitoring stations that do not provide a particular pollutant reading.
     * In such a case the respective WAQI method returns a null value.
     *
     * @param string $method the class method that obtains the pollutant level value
     */
    private function assertNoPollutantReading(string $method): void
    {
        $this->waqi->shouldReceive($method)
            ->once()
            ->withNoArgs()
            ->andReturnNull();

        $result = $this->waqi->$method();

        $this->assertNull($result);
    }
}
