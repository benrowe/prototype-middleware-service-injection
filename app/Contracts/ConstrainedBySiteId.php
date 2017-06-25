<?php

namespace App\Contracts;

/**
 * Interface ConstrainedBySiteId
 *
 * For services that require the site id
 *
 * @package App\Contracts
 */
interface ConstrainedBySiteId
{
    public function setSiteId(int $siteId);
}
