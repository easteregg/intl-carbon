<?php

namespace Easteregg\IntlCarbon;

use Illuminate\Support\ServiceProvider;

class IntlServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/intl.php', 'intl');
        $this->publishes([
            __DIR__ . '/Config/intl.php' => config_path("intl.php"),
        ], 'intl-carbon.config');
    }


}
