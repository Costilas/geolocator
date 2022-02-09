<?php

namespace Class\LocatorTest;

use Class\Ip\Ip;
use Class\Locator\Locator;

class LocatorTest extends TestCase
{
    public function testSuccess(): void
    {
        $locator = new Locator();
        $location = $locator->locate(new Ip('8.8.8.8'));

        self::assertNotNull($location);
        self::assertEquals('United States', $location->getCountry());
        self::assertEquals('California', $location->getRegion());
        self::assertEquals('Mountain View', $location->getCity());
    }

    public function testNotFound(): bool
    {
        $locator = new Locator();
        $location = $locator->locate(new Ip('0.0.0.1'));

        return self::assertNull($location);
    }
}