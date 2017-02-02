<?php

namespace Tests\Unit;

use Carbon\Carbon;
use IntlDateFormatter;
use Tests\TestCase;

class IntlCarbonTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_instantiate_with_carbon_objects()
    {
        $now = Carbon::now();
        $timezone = "Asia/Tehran";
        $locale = "fa_IR@calendar=persian";
        $calendar = IntlDateFormatter::TRADITIONAL;
        $formatter = new IntlDateFormatter(
            $locale,
            IntlDateFormatter::SHORT,
            IntlDateFormatter::NONE,
            $timezone,
            $calendar
        );
        dd($formatter->format($now));

    }
}
