<?php
    declare(strict_types = 1);
    session_start();


use Class\Http\HttpClient;
use Class\Ip\Ip;
use Class\Locator\ChainLocator;
use Class\Locator\MuteLocator;
use Class\Locator\Services\IpGeoLocationLocator;
use Class\Locator\Services\IpInfoLocator;
use Class\Support\Error\ErrorHandler;
use Class\Support\Loger\Loger;


include './autoload.php';

    print_r($_POST['ip']);

if(!empty($_POST['ip'])){
    $http = new HttpClient();
    $ip = new Ip($_POST['ip']);
    $loger = new Loger();
    $handler = new ErrorHandler($loger);


    //file_get_content, without key, unlimited
    $locatorService1 = new IpGeoLocationLocator($http);
    //Curl method, with API key, limit on queries
    $locatorService2 = new IpInfoLocator($http, 'XJ2Y9JXXZ7');

    $locator = new ChainLocator
    (
        new MuteLocator($locatorService1, $handler),
        new MuteLocator($locatorService2, $handler)
    );

    $location = $locator->locate($ip);
    if($location) {
        echo $location->getCountry() . '</br>';
        echo $location->getRegion() . '</br>';
        echo $location->getCity() . '</br>';
    }else {
        echo "Location: NULL";
    }
}

require 'form.php';

?>