<?php

namespace App\Repositories\Contracts;

use App\Entity\Site;

/**
 * SiteRepository Contract
 *
 * @package App\Repositories\Contracts
 */
interface SiteRepository
{
    /**
     * @param int $siteId
     * @return Site|null
     */
    public function find(int $siteId): ?Site;
}
