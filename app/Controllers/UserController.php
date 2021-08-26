<?php

namespace App\Controllers;

use App\Models\User;
use App\validation\Validator;

class UserController extends Controller
{

    public function login()
    {
        return $this->view('authentication.login');
    }

    public function loginPost()
    {
    
        #1 Datavalidator
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required', 'min:4'],
            'password' => ['required', 'min:4']
        ]);
        
        if($errors){
            $_SESSION['errors'][] = $errors;
            header('Location: /CourseXchange/login');
        }


        #2 Data processing
        $user = (new User($this->getDB()))->getByUsername($_POST['username']);

        if (password_verify($_POST['password'], trim($user->user_password))){
            $_SESSION['authorization'] = $user->user_acces_level;
            return header('Location: /CourseXchange/');
        } else {
            return header('Location: /CourseXchange/login');
        }
    }

    public function logout()
    {
        session_destroy();
        return header('Location: /CourseXchange/login');
    }

}
