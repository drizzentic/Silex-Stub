<?php
require_once __DIR__.'/../vendor/silex.phar';

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use \Exception;

session_start(); //this is here because I always forget it.

$app = new Application();

/* === LOAD CONFIG === */
/*
notes on $config usage:
store controller-needed $config vars in $app,
use the rest to config extensions and other 'bootstrap' stuff
*/
$config = require_once __DIR__.'/../config/config.php';
$app['name'] = $config['app.name'];
$app['author'] = $config['app.author'];

/* === REGISTER NAMESPACES === */

$app['autoloader']->registerNamespace('Symfony', __DIR__.'/../vendor/symfony/src');
//$app['autoloader']->registerNamespace('MyNamespace', __DIR__.'/MyNamespace');

/* === REGISTER EXTENSIONS === */

$app->register(new Silex\Extension\TwigExtension(), array(
  'twig.path'       => __DIR__.'/../views',
  'twig.class_path' => __DIR__.'/../vendor/twig/lib',
  'twig.options'    => array(
    'debug'           => true,/*
    'cache'           => __DIR__.'/../../cache',*/
  ),
));

$app->register(new Silex\Extension\UrlGeneratorExtension());

//awesome, but care because the default extension don't delete old logs (or at least it seemed to me)
/*
$app->register(new Silex\Extension\MonologExtension(), array(
  'monolog.logfile'       => __DIR__.'/../log/log.txt',
  'monolog.class_path'    => __DIR__.'/../vendor/monolog/src',
));
*/

//$app->register(new Silex\Extension\SessionExtension());
//requires php-intl, otherwise gives this error:
//Fatal error: Class 'Locale' not found in phar://.../silex.phar/vendor/Symfony/Component/HttpFoundation/Session.php on line 188

$app->register(new Silex\Extension\DoctrineExtension(), array(
  'db.options'  => array(
    'driver'      => $config['db.driver'],
    'dbname'      => $config['db.dbname'],
    'host'        => $config['db.host'],
    'user'        => $config['db.user'],
    'password'    => $config['db.password'],
    'path'        => $config['db.path'],
  ),
  'db.dbal.class_path'    => __DIR__.'/../vendor/doctrine-dbal/lib',
  'db.common.class_path'  => __DIR__.'/../vendor/doctrine-dbal/lib/vendor/doctrine-common/lib',
));

$app->register(new Silex\Extension\ValidatorExtension(), array());
$app->register(new Silex\Extension\FormExtension(), array());

/* === REGISTER SERVICES === */
/*
use this space to register any service you need
*/



/* === ERRORS === */

$app->error(function (Exception $e) {
  if ($e instanceof NotFoundHttpException)
    return new Response('The requested page could not be found.', 404);
  $code = ($e instanceof HttpException) ? $e->getStatusCode() : 500;
  return new Response('We are sorry, but something went terribly wrong.', $code);
});

/* === FILTERS === */

/*
$this->before(function() use ($app) {
  //do some stuff before any route is matched
});
*/
/*
$this->after(function() use ($app) {
  //do some stuff after controller has been executed
});
*/
/* === ROUTES === */

$app->match('/', function() use ($app) {
  return $app['twig']->render('index.html.twig', array(
    'title' => $app['name'],
    'author' => $app['author'],
  ));
})->bind('home');



return $app;

?>