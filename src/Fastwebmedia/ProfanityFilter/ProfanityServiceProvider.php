<?php namespace Fastwebmedia\ProfanityFilter;

use Illuminate\Support\ServiceProvider;

class ProfanityServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->package('fastwebmedia/profanity-filter');
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
