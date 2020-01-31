<?php

namespace App\Controllers;
use App\Models\Job;

class JobsController{
  public function getAddJobAction(){
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
    include '../Views/addJob.php';
  }
}