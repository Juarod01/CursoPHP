<?php
  use App\Models\Project;

  //Capturamos información del formulario y la enviamos
  /*Por defecto, para insertar datos deben haber 2 celdas en la table "created_at" y "updated_at" el formato
  debe ser DATETIME, se llenan de forma automatica, muestra la fecha de creación y modificación, si no se ponen, 
  no insertará datos.  */
  if(!empty($_POST)){
    $project = new Project();
    $project->title = $_POST['titleProject'];
    $project->description = $_POST['descriptionProject'];
    $project->save();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Add Project</title>
</head>
<body>
  <h1>Add Project</h1>
  <form action="addProject.php" method="POST">
    <label for="">Title:</label>
    <input type="text" name="titleProject">
    <br>
    <label for="">Description:</label>
    <input type="text" name="descriptionProject">
    <br>
    <button type="submit">Save</button>
  </form>
</body>
</html>