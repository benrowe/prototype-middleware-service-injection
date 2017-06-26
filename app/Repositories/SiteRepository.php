<?php

namespace App\Repositories;

use App\Entity\Site;

/**
 * Class SiteRepository
 * This would contain calls to the db...
 *
 * @package App\Repositories
 */
class SiteRepository implements Contracts\SiteRepository
{
    /**
     * @param int $siteId
     * @return Site|null
     */
    public function find(int $siteId): ?Site
    {
        if ($siteId > 100) {
            return null;
        }

        return $this->buildSiteConfig($siteId, new Site);
    }

    /**
     * @param int  $siteId
     * @param Site $site
     * @return Site
     */
    private function buildSiteConfig(int $siteId, Site $site): Site
    {
        $site->setName('default site '.$siteId);
        $site->setId($siteId);

        $config = ['providers' => []];
        switch ($siteId) {
            case 10:
            case 11:
                $config['providers'][] = 'Custom\AdvancedEpgProvider';
                break;
            default:
                break;
        }

        $site->setConfig($config);

        return $site;
    }
}
