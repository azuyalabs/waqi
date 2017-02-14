<?php
/**
 * This file is part of the WAQI (World Air Quality Index) package.
 *
 * Copyright (c) 2017 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <stelgenhof@gmail.com>
 */

namespace Azuyalabs\WAQI\Exceptions;

use Exception;

/**
 * Class for representing the exception that the WAQI API does not know the given monitoring station or city name.
 *
 * @package Azuyalabs\WAQI\Exceptions
 */
class UnknownStationException extends Exception
{
    /**
     * UnknownStationException constructor.
     *
     * @param string $station the name of the unknown monitoring station or city name
     * @param int $code error code associated with this exception
     * @param Exception|null $previous possible previous exception
     */
    public function __construct(string $station, $code = 0, Exception $previous = null)
    {
        parent::__construct(sprintf('Unknown monitoring station or city: "%s"', $station), $code, $previous);
    }
}
