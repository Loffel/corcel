<?php

namespace Loffel\Laravel;

use Loffel\Corcel;
use Loffel\Laravel\Auth\AuthUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Thunder\Shortcode\Parser\RegularParser;
use Thunder\Shortcode\ShortcodeFacade;

/**
 * Class CorcelServiceProvider
 *
 * @package Loffel\Providers\Laravel
 * @author Mickael Burguet <www.rundef.com>
 * @author Junior Grossi <juniorgro@gmail.com>
 */
class CorcelServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->publishConfigFile();
        $this->registerAuthProvider();
    }

    /**
     * @return void
     */
    private function publishConfigFile()
    {
        $this->publishes([
            __DIR__ . '/config.php' => base_path('config/corcel.php'),
        ], 'config');
    }

    /**
     * @return void
     */
    private function registerAuthProvider()
    {
        Auth::provider('corcel', function ($app, array $config) {
            return new AuthUserProvider($config);
        });
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app->bind(ShortcodeFacade::class, function () {
            return tap(new ShortcodeFacade(), function (ShortcodeFacade $facade) {
                $parser_class = config('corcel.shortcode_parser', RegularParser::class);
                $facade->setParser(new $parser_class);
            });
        });
    }
}
