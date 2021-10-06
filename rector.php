<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [
//        __DIR__.'/src',
        __DIR__.'/tests',
    ]);

    $parameters->set(Option::AUTOLOAD_PATHS, [
        // the path to the exact class file
//        __DIR__.'/vendor/symfony/framework-bundle',
//        __DIR__.'/vendor/symfony/http-kernel',
//        __DIR__.'/vendor/symfony/event-dispatcher-contracts',
//        __DIR__.'/vendor/psr/event-dispatcher',
        __DIR__.'/vendor/phpunit/phpunit',
    ]);

    // Define what rule sets will be applied
    $containerConfigurator->import(SetList::CODE_QUALITY);
    $containerConfigurator->import(SetList::TYPE_DECLARATION_STRICT);
    $containerConfigurator->import(SetList::PHP_73);
    $containerConfigurator->import(SetList::DEAD_CODE);

    // get services (needed for register a single rule)
    //$services = $containerConfigurator->services();

    // register a single rule
   // $services->set(TypedPropertyRector::class);
};
