<?php
  //Variales de errores
  ini_set('display_errors', 1);
  ini_set('display_starup_error', 1);
  error_reporting(E_ALL); //Todos los errores.

  require_once '../vendor/autoload.php';

  use Illuminate\Database\Capsule\Manager as Capsule;
  use Aura\Router\RouterContainer;

  $capsule = new Capsule;
  $capsule->addConnection([
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'cursophp',
      'username'  => 'root',
      'password'  => '',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
  ]);
  // Make this Capsule instance available globally via static methods... (optional)
  $capsule->setAsGlobal();
  // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
  $capsule->bootEloquent();

  $request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$baseRoute = '/cursophp';

$map->get('index', $baseRoute.'/', '../index.php');
$map->get('addJob', $baseRoute.'/add/job', '../addJob.php');
$map->get('addProject', $baseRoute.'/add/project', '../addProject.php');

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if(!$route){
  echo 'No route';
}else{
  //var_dump($route->handler);
  require $route->handler;
}
//var_dump($request->getUri()->getPath()); // Viene definido del PSR7


  // $route = $_GET['route'] ?? '/';
  // if($route == '/'){
  //   require '../index.php';
  // } elseif($route == 'addJob'){
  //   require '../addJob.php';
  // } elseif($route == 'addProject'){
  //   require '../addProject.php';
  // }
  