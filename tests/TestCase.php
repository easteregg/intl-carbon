<?php

namespace Tests;

use Easteregg\Package\PackageServiceProvider;
use Faker\Factory;
use Orchestra\Testbench\TestCase as TestBenchCase;
use Tests\Stubs\PackageServiceProvider as DatabaseTestProvider;

abstract class TestCase extends TestBenchCase
{
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate', ['--database' => 'testing']);
        $this->withFactories(__DIR__ . '/factories');
    }
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
    }
    /**
     * Get package providers.  At a minimum this is the package being tested, but also
     * would include packages upon which our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the 'providers' array in
     * the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            DatabaseTestProvider::class
        ];
    }
}

