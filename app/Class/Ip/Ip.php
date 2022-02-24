<?php

namespace Class\Ip;

use InvalidArgumentException;

final class Ip
{
    private string $value;

    public function __construct(string $ip)
    {
        $ip = $this->validate($ip);
        $this->value = $ip;
    }


    private function validate(string $ip):string {
        if(empty($ip)) {
            throw new InvalidArgumentException('Empty IP');
        }
        if(filter_var($ip, FILTER_VALIDATE_IP) === false) {
            throw new InvalidArgumentException("Invalid IP: $ip");
        }

        return $ip;
    }

    public function getIp(): string
    {
        return $this->value;
    }
}