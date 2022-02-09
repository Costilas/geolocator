<?php

namespace Class\Locator\Interface;

use Class\Ip\Ip;
use Class\Location\Location;

interface Locator
{
    public function locate(Ip $ip): ?Location;
}