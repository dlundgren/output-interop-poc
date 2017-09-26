output-interop-poc
==================

This a simple library as a proof-of-concept for the [Output Interop](https://github.com/output-interop/output-interop) initiative.

The primary purpose of this is to show that there is a common interface
between all of the various renderers, and that they can all use a 
more generic way of getting data into the system.

There are provided adapters for the following:

* [Foil](https://github.com/FoilPHP/Foil)
* [Twig](https://github.com/fabpot/Twig)
* [Smarty](https://github.com/smarty-php/smarty)
* [Laravel Blade](https://laravel.com/docs/5.3/blade)
* [League Plates](https://github.com/thephpleague/plates)
* Custom simple PHP renderer

The Output-Interop idea was based on Foil, but it looks like Twig also
has the concept of Contexts.

While there are currently no unit tests for the overall system. There
are integration tests for the above renderers.