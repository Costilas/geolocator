<?php

namespace Class\LocatorTest;

use Class\Location\Location;

abstract class TestCase
{
    public static function assertNotNull($element) {
        return !is_null($element);
    }

    public static function assertNull($element) {
        return is_null($element);
    }


    public static function assertEquals(string $compare, string $comparable) {
        return $compare === $comparable;
    }


}
