<?php
    declare(strict_types = 1);
    session_start();
require 'config/init.php';

use Class\Http\HttpClient;
use Class\Ip\Ip;
use Class\Locator\CacheLocator;
use Class\Locator\ChainLocator;
use Class\Locator\MuteLocator;
use Class\Locator\Services\IpGeoLocationLocator;
use Class\Locator\Services\IpInfoLocator;
use Class\Support\Cache\Cache;
use Class\Support\Error\ErrorHandler;
use Class\Support\Loger\Loger;

include './autoload.php';

if(!empty($_POST['ip'])){
    $cachePath = ROOT . '/tmp/cache/';
    $http = new HttpClient();
    $ip = new Ip($_POST['ip']);
    $loger = new Loger();
    $handler = new ErrorHandler($loger);
    $cache = new Cache($cachePath);
    $apiMapKey = "adcc472e-ca98-412f-9dd3-02b89471bba2";

    //file_get_content, without key, unlimited
    $locatorService1 = new IpGeoLocationLocator($http);
    //Curl method, with API key, limit on queries
    $locatorService2 = new IpInfoLocator($http, 'XJ2Y9JXXZ7');

    $locator = new ChainLocator
    (
        new CacheLocator(new MuteLocator($locatorService1, $handler), $cache, 30),
        new CacheLocator(new MuteLocator($locatorService2, $handler), $cache, 30)
    );

    $location = $locator->locate($ip);
    if($location) {
        $country = $location->getCountry();
        $region = $location->getRegion();
        $city = $location->getCity();
        $latitude = $location->getLatitude();
        $longitude = $location->getLongitude();
    }else {
        echo "Location: NULL";
    }
}

require 'form.php';