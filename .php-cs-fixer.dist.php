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
 * @author Sacha Telgenhof <me at sachatelgenhof dot com>
 */

$config = new AzuyaLabs\PhpCsFixerConfig\Config('2017', null, 'WAQI (World Air Quality Index)');
$config->getFinder()->in(__DIR__)->notPath('var');

return $config;
