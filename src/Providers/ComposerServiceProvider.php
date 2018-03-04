<?php

namespace OpenDominion\Providers;

use Cache;
use Illuminate\Contracts\View\View;
use OpenDominion\Calculators\Dominion\LandCalculator;
use OpenDominion\Calculators\NetworthCalculator;
use OpenDominion\Services\Dominion\SelectorService;

class ComposerServiceProvider extends AbstractServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.topnav', function (View $view) {
            $selectorService = app(SelectorService::class);
            $view->with('selectorService', $selectorService);
        });

        view()->composer('partials.main-footer', function (View $view) {
            $version = (Cache::has('version-html') ? Cache::get('version-html') : 'unknown');
            $view->with('version', $version);
        });

        // todo: do we need this here in this class?
        view()->composer('partials.resources-overview', function (View $view) {
            $view->with('landCalculator', app(LandCalculator::class));
            $view->with('networthCalculator', app(NetworthCalculator::class));
        });
    }
}
