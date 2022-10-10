<?php

namespace Yahrdy\Aamarpay;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Yahrdy\Aamarpay\Commands\AamarpayCommand;

class AamarpayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('aamarpay')
            ->hasConfigFile()
            ->hasRoute('api');
    }
}
