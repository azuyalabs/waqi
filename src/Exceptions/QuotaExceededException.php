<?php declare(strict_types=1);
/**
 * This file is part of the WAQI (World Air Quality Index) package.
 *
 * Copyright (c) 2017 - 2019 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace Azuyalabs\WAQI\Exceptions;

use Exception;

/**
 * Class for representing the exception that the use of the WAQI API usage quota has been exceeded.
 *
 * The default quota is maximum 1000 (thousand) requests per minute.
 *
 * @link http://aqicn.org/api
 */
class QuotaExceededException extends Exception
{
    /**
     * QuotaExceededException constructor.
     */
    public function __construct()
    {
        parent::__construct('Request Quota has been exceeded');
    }
}
