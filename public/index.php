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

//$map->get('index', $baseRoute.'/', '../index.php');
$map->get('index', $baseRoute.'/', [
  'controller' => 'App\Controllers\IndexController',
  'action' => 'indexAction'
]);
$map->get('addJob', $baseRoute.'/add/job', [
  'controller' => 'App\Controllers\JobsController',
  'action' => 'getAddJobAction'
]);
$map->get('addProject', $baseRoute.'/add/project', [
  'controller' => 'App\Controllers\ProjectsController',
  'action' => 'getAddProjectAction'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);


function printElement($job) {
  // if($job->visible == false) {
  //   return;
  // }

  echo '<li class="work-position">';
  echo '<h5>' . $job->Title . '</h5>';
  echo '<p>' . $job->Description . '</p>';
  echo '<p>' . $job->getDurationAsString() . '</p>';
  echo '<strong>Achievements:</strong>';
  echo '<ul>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '</ul>';
  echo '</li>';
}


if(!$route){
  echo 'No route';
}else{
  $handlerData = $route->handler;
  $controllerName = $handlerData['controller'];
  $actionName = $handlerData['action'];

  $controller = new $controllerName;
  $controller->$actionName();
  //var_dump($route->handler);
  //require $route->handler;
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
  