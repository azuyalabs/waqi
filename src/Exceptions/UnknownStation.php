<?php

declare(strict_types=1);

/**
 * This file is part of the WAQI (World Air Quality Index) package.
 *
 * Copyright (c) 2017 - 2024 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace Azuyalabs\WAQI\Exceptions;

/**
 * Class for representing the exception that the WAQI API does not know the given monitoring station or city name.
 */
final class UnknownStation extends \Exception
{
    public function __construct()
    {
        parent::__construct('Unknown monitoring station or city');
    }
}
