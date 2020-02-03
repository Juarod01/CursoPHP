<?php

namespace App\Controllers;
use App\Models\Project;

class ProjectsController extends BaseController{
  public function getAddProjectAction($request){
    //Capturamos información del formulario y la enviamos
    /*Por defecto, para insertar datos deben haber 2 celdas en la table "created_at" y "updated_at" el formato
    debe ser DATETIME, se llenan de forma automatica, muestra la fecha de creación y modificación, si no se ponen, 
    no insertará datos.  */
    if($request->getMethod() == 'POST'){
      $postData = $request->getParsedBody();
      $project = new Project();
      $project->title = $postData['title'];
      $project->description = $postData['description'];
      $project->save();
    }
    //include '../Views/addProject.php';
    return $this->renderHTML('addProject.twig');
  }
}