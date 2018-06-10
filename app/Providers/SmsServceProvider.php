<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Plugins\Filter;
use App\SmsCode;

class SmsServceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot(Request $request)
    {
        $app = $this->app;

        $app['validator']->extend('sms', function ($attribute, $value) use ($app, $request) {
            return $app['sms']->where([['code', $value], ['mobile', Filter::mobile($request->mobile)]])->delete();
        });

        if ($app->bound('form')) {
            $app['form']->macro('sms', function ($attributes = []) use ($app) {
                return $app['sms']->display($attributes, $app->getLocale());
            });
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('sms', function ($app) {
            return new SmsCode;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['sms'];
    }

}
