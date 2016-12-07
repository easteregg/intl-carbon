<?php

namespace Tests;

use Easteregg\Package\PackageServiceProvider;
use Faker\Factory;
use Orchestra\Testbench\TestCase as TestBenchCase;

abstract class TestCase extends TestBenchCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->app->setLocale('en');

        $this->migrateTables();
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $app['config']->set('translatable.locales', ['en']);
    }


    private function migrateTables()
    {
        $this->artisan('migrate', [
            '--database' => 'testing',
            '--realpath' => realpath(__DIR__ . '/Migrations'),
        ]);

        $this->artisan('vendor:publish');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            // List Package Providers Here
            PackageServiceProvider::class
        ];
    }
}

