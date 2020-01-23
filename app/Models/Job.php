<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; //Para traer la información de la base de datos.

class Job extends Model{ //Extendemos la clase de a libreria.
  protected $table = 'jobs'; //Llamamos la tabla de la BBDD

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