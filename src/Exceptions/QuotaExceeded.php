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

namespace Azuyalabs\WAQI\Exceptions;

/**
 * Class for representing the exception that the use of the WAQI API usage quota has been exceeded.
 *
 * The default quota is maximum 1000 (thousand) requests per minute.
 *
 * @see http://aqicn.org/api
 */
final class QuotaExceeded extends \Exception
{
    public function __construct()
    {
        parent::__construct('Request Quota has been exceeded');
    }
}
