<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Easteregg\IntlCarbon\LocalizesCarbon;
use Tests\Stubs\Post;
use Tests\TestCase;

class LocalizesCarbonTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_extend_carbon()
    {
        $localize = new LocalizesCarbon();
        $this->assertInstanceOf(Carbon::class, $localize);
    }

    /**
     * @test
     */
    public function it_should_provide_formatting_to_intl_date_formatter()
    {
        // Preparation
        $this->app['config']->set("app.locale", 'fa');
        $localize = LocalizesCarbon::createFromFormat("Y-m-d H:i:s", "2017-01-01 00:00:00", 'Asia/Tehran');
        // Exec

        // Assertion
        $this->assertEquals("یکشنبه, ۱۲ دی ۱۳۹۵ ۰۰:۰۰:۰۰ به وقت ایران"
            , $localize->long());
    }

    /**
     * @test
     */
    public function it_should_read_calendar_setting_from_config()
    {
        // Preparation
        $localize = LocalizesCarbon::createFromFormat("Y-m-d H:i:s", "2017-01-01 00:00:00", 'Asia/Tehran');
        $this->app['config']->set('app.locale', 'fa');
        $this->assertEquals("یکشنبه, ۱۲ دی ۱۳۹۵ ۰۰:۰۰:۰۰ به وقت ایران"
            , $localize->long());

        $this->app['config']->set('app.locale', 'en');
        $this->assertNotEquals("۱۲ دی ۱۳۹۵ ه‍.ش.، ساعت ۰:۰۰:۰۰ (+۳:۳۰ گرینویچ)"
            , $localize->long());
    }

    /**
     * @test
     */
    public function it_should_provide_formatting_to_all_model_attributes_defined_as_dates()
    {
        $post = factory(Post::class)->create([
            'created_at' => LocalizesCarbon::createFromFormat("Y-m-d H:i:s", "2017-01-01 00:00:00", 'Asia/Tehran')
        ]);

        $this->assertTrue(method_exists($post->created_at, 'long'));

        $this->app['config']->set('app.locale', 'en');

        $this->assertEquals('January 1, 2017 at 03:30:00 Iran Time', $post->created_at->long());

        $this->app['config']->set('app.locale', 'fa');

        $this->assertEquals('یکشنبه, ۱۲ دی ۱۳۹۵ ۰۳:۳۰:۰۰ به وقت ایران', $post->created_at->long());
    }

}
