<?php

namespace App\Http\Middleware;

use App\Contracts\ConstrainedBySiteId;
use App\Entity\Site;
use Closure;
use App\Repositories\Contracts\SiteRepository;

/**
 * Site Service Injection Middleware
 *
 * Detects the requested site and loads in the configured providers
 *
 * @package App\Http\Middleware
 */
class SiteServiceInjection
{
    private $site;

    /**
     * SiteServiceInjection constructor.
     *
     * @param SiteRepository $site
     */
    public function __construct(SiteRepository $site)
    {
        $this->site = $site;
    }

    /**
     * @param         $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $site = $this->getSite($request);
        if ($site) {
            foreach ($site->getConfigValue('providers', []) as $object) {
                $provider = 'App\\Providers\\'.$object;
                $provider = new $provider(app());
                if ($provider instanceof ConstrainedBySiteId) {
                    $provider->setSiteId($site->getId());
                }
                app()->register($provider);
            }
        } else {
            // unable to load site!
            abort(404);
        }
        return $next($request);
    }

    /**
     * Retrieve an instance of the site based on the current request
     *
     * note: other siteId detection methods could be used here, such as GET, POST, headers, etc
     *
     * @param $request
     * @return Site|null
     */
    private function getSite($request): ?Site
    {
        $siteId = (int)$request->route()[2]['siteId'];

        return $this->site->find($siteId);
    }
}
