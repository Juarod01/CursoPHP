<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; //Para traer la información de la base de datos.

class Job extends Model{ //Extendemos la clase de a libreria.
//class Job extends BaseElement{
  /*public function __construct($title, $description){
    $newTitle = 'Job: ' . $title; 
    
    $this->title = $newTitle;
    $this->description = $description;
  }*/

  public function getDurationAsString(){
    $years = floor($this->months / 12);
    $extraMonths = $this->months % 12;
  
    if($this->months < 12){
      return "Job duration $extraMonths months";
    }else{
      if($extraMonths == 0)
      {
        return "Job duration $years years";  
      }else{
        return "Job duration $years years $extraMonths months";
      }
    }
  }
}