<?php

declare (strict_types = 1);

use PHPUnit\Framework\TestCase;
use HL\Weather;

final class WeatherTest extends TestCase
{
    public function testforecast()
    {
        $w = new Weather();

        $this->assertCount(9, $w->forecast());
    }
}
