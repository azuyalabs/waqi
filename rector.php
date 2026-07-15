<?php

declare(strict_types = 1);

/**
 * This file is part of the 'WAQI (World Air Quality Index)' package.
 *
 * Simple PHP Wrapper for the World Air Quality Index API.
 *
 * Copyright (c) 2017 - 2026 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me at sachatelgenhof dot com>
 */

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withParallel()
    ->withFluentCallNewLine()
    ->withPhpSets()
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        typeDeclarations: true,
        earlyReturn: true,
    )
    ->withComposerBased(phpunit: true);
