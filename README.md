# Laravel 5 Template Package

## Introduction

This package provides with the somehow semi-conventional structure that is going to work for your needs. 
Out of the box, phpunit is configured, service provider and routing is also is done. 
 
Publishing assets and views are defined in `PackageServiceProvider::class` , so you can quickly jump on the code and start creating the application.
 

## Getting Started

1. make a clone of the package using `git clone git@gitlab.com:easteregg/package-template.git`
2. Update package name and other details in `composer.json` file.
3. Change the name of the `PackageServiceProvider` to your needs.
4. Change the namespace of the package, defined in `PackageServiceProvider`, to publish views, db and assets, this namespace also used in loading views and translations.


## Write Your first test

This package uses `orchestra/testbench`, an awesome package for testing laravel applications, for more convenience, basic operations is already setup. you only need to update method `\Tests\TestCase@getPackageProviders()` and replace `PackageServiceProvider` with renamed service provider. 
 for testing, remember to extend from `\Tests\TestCase` base class, not the original laravel one. 
 
## More features are coming...

1. Gitlab Continuous integration is supported for phpunit projects out of the box.
