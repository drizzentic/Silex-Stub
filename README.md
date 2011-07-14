#Silex Stub

This is something I made while experimenting with [Silex](https://github.com/fabpot/Silex) to understand how it works.

The idea is to have something ready to copypaste when starting a new project.

###What's inside?

A Silex Application, obviously: _index.php_ starts the app returned by _src/app.php_.

There are several **extensions** ready to be used:

+ Twig
+ UrlGenerator
+ Monolog
+ Doctrine DBAL
+ Validator
+ Forms

To use Monolog you have to uncomment the related code on _app.php_,
and then magically _log/log.txt_ will appear when running the app.  
Put your templates in _views/_, and your images, css, scripts, etc. in _assets/_.  
There's a _cache/_ directory if you want to activate twig caching.

As you can see, there are several _.htaccess_ files: besides root directory,
only _assets/_ is accessible.

There is a config file: _config/config.php_. This is where you can put extensions parameters
and other general stuff for an easier deployment.

Doctrine default config tells our app to look for _db/app.sqlite_, you can create your own **SQLite** database
or change settings to something else and use whatever you like.
