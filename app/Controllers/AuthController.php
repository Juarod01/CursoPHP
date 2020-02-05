<?php

namespace App\Controllers;
use App\Models\User;
use Respect\Validation\Validator as v;

class AuthController extends BaseController{

  public function getLogin(){
    return $this->renderHTML('login.twig');
  }

  public function postLogin($request){
    $postData = $request->getParsedBody();
    $user = User::where('mail', $postData['mail'])->first();
    if($user){
      if(\password_verify($postData['password'], $user->password)){
        echo 'Password correct';
      }else{
        echo 'Password wrong';
      }
    }else{
      echo 'Not found';
    }
  }
}