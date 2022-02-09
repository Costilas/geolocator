<?php
    declare(strict_types = 1);
    session_start();

    include './autoload.php';

$locator = new \Class\Locator\Locator();
$_POST['ip'] = '8.8.8.8';
if(!empty($_POST['ip'])){
    $location = $locator->locate(new \Class\Ip\Ip($_POST['ip']));

    echo $location->getCountry() . '</br>';
    echo $location->getRegion() . '</br>';
    echo $location->getCity() . '</br>';
}

require 'form.php';

?>