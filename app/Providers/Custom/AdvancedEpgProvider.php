<?php

namespace App\Providers\Custom;

use App\Contracts\ConstrainedBySiteId;
use App\Services\AdvancedEpg;
use Illuminate\Support\ServiceProvider;

class AdvancedEpgProvider extends ServiceProvider implements ConstrainedBySiteId
{
    private $siteId;

    public function register()
    {
        $siteId = $this->siteId;
        $this->app->bind('epg', function () use ($siteId) {
           $epg = new AdvancedEpg();

           $epg->setSiteId($siteId);

           return $epg;
        });
    }

    public function setSiteId(int $siteId)
    {
        $this->siteId = $siteId;
    }
}
