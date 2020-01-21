<?php
namespace app\Models;

require_once 'BaseElement.php';

class Job extends BaseElement{

  public function __construct($title, $description){
    $newTitle = 'Job: ' . $title; 
    //parent::__construct($newTitle, $description);
    $this->title = $newTitle;
  }

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