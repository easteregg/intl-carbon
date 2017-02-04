# Laravel 5.4 Eloquent Carbon Methods

This package provides a convenient way to localize and format Eloquent date attributes. using this package, you can localize date attributes of any model 
to any calendar you want. 


## Installation

1. run `composer require easteregg/intl-carbon`
 
2. run `php artisan vendor:publish --tag="intl-carbon.config"` to publish the config files. (optional)


## Usage
 
 Edit the config file and select a calendar for each locale your application might be having
 
 see: (https://secure.php.net/manual/en/class.intldateformatter.php)

 Edit your eloquent model and add use `Easteregg\IntlCarbon\LocalizesDates`
 
 example: 
 
 ```$xslt
<?php

use Easteregg\IntlCarbon\LocalizesDates;

class Post extends Model
{
    use LocalizesDates;
}


```
 Pull requests are welcome for this repository.
##
