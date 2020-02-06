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
$map->post('saveJob', $baseRoute.'/add/job', [
  'controller' => 'App\Controllers\JobsController',
  'action' => 'getAddJobAction'
]);
$map->get('addProject', $baseRoute.'/add/project', [
  'controller' => 'App\Controllers\ProjectsController',
  'action' => 'getAddProjectAction'
]);
$map->post('saveProject', $baseRoute.'/add/project', [
  'controller' => 'App\Controllers\ProjectsController',
  'action' => 'getAddProjectAction'
]);
$map->get('addUser', $baseRoute.'/add/user', [
  'controller' => 'App\Controllers\UserController',
  'action' => 'getAddUserAction'
]);
$map->post('saveUser', $baseRoute.'/add/user', [
  'controller' => 'App\Controllers\UserController',
  'action' => 'getAddUserAction'
]);
$map->get('loginForm', $baseRoute.'/login', [
  'controller' => 'App\Controllers\AuthController',
  'action' => 'getLogin'
]);
$map->post('auth', $baseRoute.'/auth', [
  'controller' => 'App\Controllers\AuthController',
  'action' => 'postLogin'
]);
$map->get('admin', $baseRoute.'/admin', [
  'controller' => 'App\Controllers\AdminController',
  'action' => 'getIndex',
  'auth' => true
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
  $needsAuth = $handlerData['auth'] ?? false;

  $controller = new $controllerName;
  $response = $controller->$actionName($request); 

  foreach($response->getHeaders() as $name=>$values){
    foreach($values as $value){
      header(sprintf('%s: %s', $name, $value), false);
    }
  }
  http_response_code($response->getStatusCode());
  echo $response->getBody();
}  