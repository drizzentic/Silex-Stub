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
only _assets/_ and _dbadmin/_ are accessible.

And lastly, the database. In _db/_ lies an empty **SQLite** database, while _dbadmin/_ folder contains
[phpLiteAdmin](http://phpliteadmin.googlecode.com) v 1.8.6 to ease db administration.

###Configuration

To start developing you can just copypaste it and start working on _src/app.php_, but there are a few things
to know:

+ PhpLiteAdmin default password is "admin": to change it, open _dbadmin/phpliteadmin.php_ and edit it.
+ There is a config file: _config/config.php_. This is where you can put extensions parameters
and other general stuff you will need. When deploying your app just edit this file
(and the password I mentioned above :P)

