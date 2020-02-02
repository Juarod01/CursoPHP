<?php

namespace App\Controllers;
use App\Models\Job;

class JobsController extends BaseController{
  public function getAddJobAction($request){
    //Capturamos información del formulario y la enviamos
    /*Por defecto, para insertar datos deben haber 2 celdas en la table "created_at" y "updated_at" el formato
    debe ser DATETIME, se llenan de forma automatica, muestra la fecha de creación y modificación, si no se ponen, 
    no insertará datos.  */
    if($request->getMethod() == 'POST'){
      $postData = $request->getParsedBody();
      $job = new Job();
      $job->title = $postData['title'];
      $job->description = $postData['description'];
      $job->save();
    }
    //include '../Views/addJob.php';
    echo $this->renderHTML('addJob.twig');
  }
}