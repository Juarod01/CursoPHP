<?php

namespace App\Controllers;
use App\Models\User;
use Respect\Validation\Validator as v;
use Laminas\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController{

  public function getLogin(){
    return $this->renderHTML('login.twig');
  }

  public function postLogin($request){
    $postData = $request->getParsedBody();
    $responseMessage = null;
    $user = User::where('mail', $postData['mail'])->first();
    $baseRoute = '/cursophp';
    if($user){
      if(\password_verify($postData['password'], $user->password)){
        return new RedirectResponse($baseRoute.'/admin');
      }else{
        $responseMessage = 'Bad credentials';
      }
    }else{
      $responseMessage = 'Bad credentials';
    }

    return $this->renderHTML('login.twig', [
      'ResponseMessage' => $responseMessage
    ]);
  }
}