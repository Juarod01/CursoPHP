<?php

namespace App\Controllers;
use App\Models\Project;

class ProjectsController{
  public function getAddProjectAction(){
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
    include '../Views/addProject.php';
  }
}