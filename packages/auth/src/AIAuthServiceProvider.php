<?php

namespace AI\Auth;

use Illuminate\Routing\Router;
use AI\Auth\Http\Middleware\AuthGates;
use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class AIAuthServiceProvider extends SupportServiceProvider
{
    const NAMESPACE = PackageConst::NAMESPACE;

    /**
     * Root path of the package
     *
     * @var string
     */
    private $rootPath;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->rootPath = realpath(__DIR__ . '/../');

        $this->mergeConfigFrom($this->rootPath . '/config/auth.php', SELF::NAMESPACE);

        $this->app->register(EventServiceProvider::class);
        $this->app->register(AuthServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom($this->rootPath . '/database/migrations');
        $this->loadTranslationsFrom($this->rootPath . '/resources/lang', self::NAMESPACE);
        $this->loadViewsFrom($this->rootPath . '/resources/views', self::NAMESPACE);
        $this->loadRoutesFrom($this->rootPath . '/routes/api.php');
        $this->loadRoutesFrom($this->rootPath . '/routes/web.php');

        $this->publishAssets();
    }

    protected function publishAssets()
    {
        $this->publishes([
            $this->rootPath . '/public/assets/auth_images' => public_path('assets'),
        ], 'public');
    }
}
