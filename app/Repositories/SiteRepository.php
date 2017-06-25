<?php

namespace App\Repositories;

use App\Entity\Site;

/**
 * Class SiteRepository
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
        $config = ['providers' => []];
        switch ($siteId) {
            case 11:
                $config['providers'][] = 'AdvancedEpgProvider';
                $config['providers'][] = 'SpecialSomethingProvider';
                break;
            case 12:
                $config['providers'][] = 'AdvancedEpgProvider';
                $config['providers'][] = 'SpecialSomethingProvider';
                break;
            default:
                break;
        }

        $site->setConfig($config);

        return $site;
    }
}
