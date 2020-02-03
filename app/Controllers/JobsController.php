<?php

namespace App\Controllers;
use App\Models\Job;
use Respect\Validation\Validator as v;

class JobsController extends BaseController{
  public function getAddJobAction($request){
    $ResponseMessage = null;

    if($request->getMethod() == 'POST'){
      $postData = $request->getParsedBody();
      $jobValidator = v::key('title', v::stringType()->notEmpty())
                  ->key('description', v::stringType()->notEmpty());

      try{
        $jobValidator->assert($postData);
        $postData = $request->getParsedBody();
        $job = new Job();
        $job->title = $postData['title'];
        $job->description = $postData['description'];
        $job->save();

        $ResponseMessage = 'Saved';
      } catch(\Exception $e){
        $ResponseMessage = $e->getMessage();
      }

      
    }

    return $this->renderHTML('addJob.twig', [
      'ResponseMessage' => $ResponseMessage
    ]);
  }
}