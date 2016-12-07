<?php

namespace Easteregg\Package;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        include __DIR__ . '/Config/routes.php';
    }
}
