<?php

namespace Tests\Stubs;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(realpath(__DIR__ . '/../migrations'));
        $this->mergeConfigFrom(__DIR__ . '/../../src/Config/intl.php', 'intl');
    }

    public function register()
    {
    }
}
