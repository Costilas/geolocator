<?php

namespace Class\Locator;

use Class\Ip\Ip;
use Class\Location\Location;
use Class\Locator\Interface\Locator;
use Class\Support\Error\ErrorHandler;

class MuteLocator implements Locator
{

    public function __construct
    (
        private Locator $next,
        private ErrorHandler $handler
    )
    {}

    public function locate(Ip $ip): ?Location {
        try {
            return $this->next->locate($ip);
        } catch (\Exception $exception) {
            $this->handler->handle($exception);
            return null;
        }
    }
}