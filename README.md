# Laravel 5.4 Eloquent Carbon Methods

This package provides a convenient way to localize and format Eloquent date attributes. using this package, you can localize date attributes of any model 
to any calendar you want. it looks for the current application locale to generate string.


## Installation

1. run `composer require easteregg/intl-carbon`
 
2. run `php artisan vendor:publish --tag="intl-carbon.config"` to publish the config files. (optional)


## Usage
 
 Edit the config file and select a calendar for each locale your application might be having
 
 see: (https://secure.php.net/manual/en/class.intldateformatter.php)


 For more information about the formatting, checkout [this](http://userguide.icu-project.org/formatparse/datetime) page.
 Edit your eloquent model and add `Easteregg\IntlCarbon\LocalizesDates` trait.
 
 example: 
 
 ```$xslt
<?php

use Easteregg\IntlCarbon\LocalizesDates;

class Post extends Model
{
    use LocalizesDates;
}


```

You should be good to go. now anywhere in the system, you can call any model date value with a new long() method to format. 
(e.g. `$post->created_at->long()).
 Pull requests are welcome for this repository.
##
