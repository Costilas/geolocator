<?php

namespace Class\Locator\Services;

use Class\Http\HttpClient;
use Class\Ip\Ip;
use Class\Location\Location;
use Class\Locator\Interface\Locator;

class IpGeoLocationLocator implements Locator
{

    public function __construct(
        private HttpClient $client) {}

    public function locate(Ip $ip): ?Location
    {
        $url = 'http://ipwhois.app/json/' . $ip->getIp() . "?objects=country,region,city,latitude,longitude";
        $response = $this->client->get($url);
        $response = json_decode($response, true);
        if($response['country']=='-'||empty($response['country'])) {
            return null;
        }
        return new Location($response['country'], $response['region'], $response['city'], $response['latitude'], $response['longitude']);
    }
}
