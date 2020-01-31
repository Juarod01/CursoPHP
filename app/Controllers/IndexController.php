<?php 

namespace App\Controllers;
use App\Models\{Job, Project};

class IndexController{
  public function indexAction(){
    $jobs = Job::all(); //Nos trae todos los registros que encuentre en la tabla de la DDBB
    $projects = Project::all();

    $name = 'Juan David Rodriguez';
    $limitMonths = 2000;

    include '../Views/index.php';
  }
}