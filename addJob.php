<?php
  require_once 'vendor/autoload.php';

  use Illuminate\Database\Capsule\Manager as Capsule;
  use App\Models\Job;

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

  //Capturamos información del formulario y la enviamos
  /*Por defecto, para insertar datos deben haber 2 celdas en la table "created_at" y "updated_at" el formato
  debe ser DATETIME, se llenan de forma automatica, muestra la fecha de creación y modificación, si no se ponen, 
  no insertará datos.  */
  if(!empty($_POST)){
    $job = new Job();
    $job->title = $_POST['title'];
    $job->description = $_POST['description'];
    $job->save();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Add Job</title>
</head>
<body>
  <h1>Add Job</h1>
  <form action="addJob.php" method="POST">
    <label for="">Title:</label>
    <input type="text" name="title">
    <br>
    <label for="">Description:</label>
    <input type="text" name="description">
    <br>
    <button type="submit">Save</button>
  </form>
</body>
</html>