<?php
/**
 * This file is part of the WAQI (World Air Quality Index) package.
 *
 * Copyright (c) 2017 - 2019 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <stelgenhof@gmail.com>
 */

namespace Azuyalabs\WAQI\Exceptions;

use Exception;

/**
 * Class for representing the exception that an invalid access token has been given.
 */
class InvalidAccessTokenException extends Exception
{
    /**
     * InvalidAccessTokenException constructor.
     */
    public function __construct()
    {
        parent::__construct('Invalid access token', 0, null);
    }
}
