<?php namespace Fastwebmedia\ProfanityFilter;

use Illuminate\Support\ServiceProvider;

class ProfanityServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $configPath = __DIR__ . '/../../config/profanity-filter.php';
        $this->mergeConfigFrom($configPath, 'profanity-filter');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['profanity'] = $this->app->share(function ($app) {
            $dependency = $this->app['config']['profanity-filter::words'];
            $whitelist = $this->app['config']['profanity-filter::whitelist'];
            return new ProfanityFilter($dependency, $whitelist);
        });
    }
}
