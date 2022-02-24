<?php

namespace Class\Locator\Services;

use Class\Http\HttpClient;
use Class\Ip\Ip;
use Class\Location\Location;
use Class\Locator\Interface\Locator;

class IpInfoLocator implements Locator
{

    public function __construct(
        private HttpClient $client,
        private string $apiKey
    ) {}

    public function locate(Ip $ip): ?Location
    {
        $url = "https://api.ip2location.com/v2/?key=" . $this->apiKey . "&ip=" . $ip->getIp() .
        "&format=json&package=WS25&&addon=country,region,city&lang=en";
        $response = $this->client->getCurl($url);
        $response = json_decode($response, true);

        if ($response['country_name']=='-'||empty($response['country_name'])) {
            return null;
        }

        return new Location($response['country_name'], $response['region_name'], $response['city_name'], $response['latitude'], $response['longitude']);
    }
}