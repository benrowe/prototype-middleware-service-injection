<?php

namespace App\Providers;


use App\Services\Core\Contracts\Epg;
use Illuminate\Support\ServiceProvider;

class EpgServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('core.epg', function() {
            return new \App\Services\Core\Epg();
        });
        $this->app->bind('epg', 'core.epg');
        $this->app->bind(Epg::class, 'epg');
    }
}
