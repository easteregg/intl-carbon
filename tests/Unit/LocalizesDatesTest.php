<?php

namespace Tests\Unit;

use Carbon\Carbon;
use IntlDateFormatter;
use Tests\Stubs\Post;
use Tests\TestCase;

class LocalizesDatesTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_provide_a_long_format_based_on_app_locale()
    {
        $post = factory(Post::class)->create();
        $post->created_at = Carbon::createFromFormat("Y-m-d H", "2017-01-01 0");

        $this->assertEquals($post->created_at->long(), "January 1, 2017 at 03:30:00 Iran Time");
        config()->set('app.locale', 'fa');
        $this->assertEquals($post->created_at->long(), "یکشنبه, ۱۲ دی ۱۳۹۵ ۰۳:۳۰:۰۰ به وقت ایران");
    }
}
