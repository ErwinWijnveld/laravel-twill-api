<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use A17\Twill\Facades\TwillNavigation;
use A17\Twill\View\Components\Navigation\NavigationLink;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        TwillNavigation::addLink(NavigationLink::make()->forModule("pages"));
        TwillNavigation::addLink(NavigationLink::make()->forModule("blogs"));
        TwillNavigation::addLink(NavigationLink::make()->forModule("reviews"));
    }
}
