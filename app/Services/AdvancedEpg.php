<?php

namespace App\Services;


use App\Contracts\ConstrainedBySiteId;
use App\Services\Core\Contracts\Epg;

class AdvancedEpg implements Epg, ConstrainedBySiteId
{
    private $siteId;

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'custom' => $this->siteId
        ];
    }

    /**
     * @param int $siteId
     */
    public function setSiteId(int $siteId)
    {
        $this->siteId = $siteId;
    }
}
