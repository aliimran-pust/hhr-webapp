<?php

namespace AI\Auth\Tests;

use AI\Auth\Models\User;
use AI\Auth\AIAuthServiceProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

class TestCase extends TestbenchTestCase
{
    use WithFaker;

    /**
     * @var \AI\Auth\Models\User
     */
    protected $user;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        //$this->loadLaravelMigrations();
        //$this->artisan('migrate')->run();

        //$this->setUser();
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
        $app['config']->set('auth.providers.users.model', User::class);
    }

    /**
     * Get package providers.  At a minimum this is the package being tested, but also
     * would include packages upon which our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the 'providers' array in
     * the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * "Cars\\Auth\\CarsAuthServiceProvider",
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            AIAuthServiceProvider::class,
        ];
    }

    /**
     * Set user to act as logged-in user
     *
     * @return void
     */
    protected function setUser()
    {
        $this->user = User::factory()->create();
    }
}
