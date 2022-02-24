<?php

namespace Class\Locator;

use Class\Ip\Ip;
use Class\Location\Location;
use Class\Locator\Interface\Locator;
use Class\Support\Cache\Cache;

class CacheLocator implements Locator
{

    public function __construct
    (
        private Locator $next,
        private Cache $cache,
        private int $ttl
    )
    {}

    public function locate(Ip $ip): ?Location
    {
        $key = 'location-' . $ip->getIp();
        $hashedName = md5($key);
        $location = $this->cache->get($hashedName);

        if($location === null) {
            $location = $this->next->locate($ip);
            if($location !== null){
                $this->cache->set($hashedName, $location, $this->ttl);
                echo "</br>Live result:</br>";
            }
        }
        return $location;
    }

}
