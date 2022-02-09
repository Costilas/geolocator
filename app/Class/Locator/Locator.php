<?php

namespace Class\Locator;

use Class\Ip\Ip;
use Class\Location\Location;

class Locator
{
    public function locate(Ip $ip): ?Location
    {

        $request = 'http://ipwhois.app/json/' . $ip->getIp() . "?objects=country,region,city";

        //This or by Curl
        $response = json_decode(file_get_contents($request), true);

        var_dump(file_get_contents($request));

        /*$response = array_map(function ($value) {
           return $value !== '-' ? $value : null;
        }, $response);*/

        if(empty($response['country'])) {
            return null;
        }

        return new Location($response['country'], $response['region'], $response['city']);
    }
}
