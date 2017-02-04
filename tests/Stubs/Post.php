<?php

namespace Tests\Stubs;

use Illuminate\Database\Eloquent\Model;
use Easteregg\IntlCarbon\LocalizesDates;

class Post extends Model
{
    use LocalizesDates;
}
