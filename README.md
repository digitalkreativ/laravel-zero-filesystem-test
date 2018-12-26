# Purpose

This project tests if the built phar file can write to the current working directory.

Phar files are special files and you can't write new files inside the phar file. If you need to write files from your Laravel zero application you should be writing with absolute paths to a location outside the phar file.

PHP has a built-in function `getcwd()` with which you can get the current working directory.

In this project we will be using this function to write a text file to the current working directory.

Command to run:

## Build the phar file

```
php laravel-zero-filesystem-test app:build laravel-zero-filesystem-test
```

## Run the command 

```
cd ..
php laravel-zero-filesystem-test/builds/laravel-zero-filesystem-test test
```


# Laravel-Zero


<p align="center">
    <img title="Laravel Zero" height="100" src="https://raw.githubusercontent.com/laravel-zero/docs/master/images/logo/laravel-zero-readme.png" />
</p>

<p align="center">
  <a href="https://travis-ci.org/laravel-zero/framework"><img src="https://img.shields.io/travis/laravel-zero/framework/stable.svg" alt="Build Status"></img></a>
  <a href="https://scrutinizer-ci.com/g/laravel-zero/framework"><img src="https://img.shields.io/scrutinizer/g/laravel-zero/framework.svg" alt="Quality Score"></img></a>
  <a href="https://packagist.org/packages/laravel-zero/framework"><img src="https://poser.pugx.org/laravel-zero/framework/d/total.svg" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel-zero/framework"><img src="https://poser.pugx.org/laravel-zero/framework/v/stable.svg" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel-zero/framework"><img src="https://poser.pugx.org/laravel-zero/framework/license.svg" alt="License"></a>
</p>

<h4> <center>This is a <bold>community project</bold> and not an official Laravel one </center></h4>

Laravel Zero was created by, and is maintained by [Nuno Maduro](https://github.com/nunomaduro), and is a micro-framework that provides an elegant starting point for your console application. It is an **unofficial** and customized version of Laravel optimized for building command-line applications.

- Built on top of the [Laravel](https://laravel.com) components.
- Optional installation of Laravel [Eloquent](http://laravel-zero.com/#/?id=database), Laravel [Logging](http://laravel-zero.com/#/?id=log) and many others.
- Supports interactive [menus](http://laravel-zero.com/#/?id=interactive-menus) and [desktop notifications](http://laravel-zero.com/#/?id=desktop-notifications) on Linux, Windows & MacOS.
- Ships with a [Scheduler](http://laravel-zero.com/#/?id=scheduler) and a [Standalone Compiler](http://laravel-zero.com/#/?id=build-a-standalone-application).
- Integration with [Collision](https://github.com/nunomaduro/collision) - Beautiful error reporting

------

## Documentation

For full documentation, visit [laravel-zero.com](http://laravel-zero.com/).

## Support the development
**Do you like this project? Support it by donating**

- PayPal: [Donate](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=66BYDWAT92N6L)
- Patreon: [Donate](https://www.patreon.com/nunomaduro)

## License

Laravel Zero is an open-source software licensed under the [MIT license](https://github.com/laravel-zero/laravel-zero/blob/stable/LICENSE.md).
