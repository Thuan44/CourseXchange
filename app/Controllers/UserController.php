<?php

namespace App\Controllers;

use App\Models\User;
use App\validation\Validator;

class UserController extends Controller
{
    // Signup
    public function signup()
    {
        return $this->view('authentication.signup');
    }

    public function signupPost()
    {

        #1 Data validator
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'user_name' => ['required', 'min:4'],
            'user_password' => ['required', 'min:4', 'password_match'],
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /CourseXchange/signup');
            return;
        }


        #2 Data processing
        $userAlreadyExists = (new User($this->getDB()))->userExists($_POST['user_name']);
        if (!$userAlreadyExists) {
            
            $_SESSION['userAlreadyExists'] = false;
            $_POST['user_password'] = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
            $user = (new User($this->getDB()))->createUser($_POST);
            
            return header('Location: /CourseXchange/login');
            
        } else {
            $_SESSION['userAlreadyExists'] = true;
            header('Location: /CourseXchange/signup');
        }

    }



    // Login
    public function login()
    {
        return $this->view('authentication.login');
    }

    public function loginPost()
    {

        #1 Data validator
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required', 'min:4'],
            'password' => ['required', 'min:4']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /CourseXchange/login');
        }


        #2 Data processing
        $user = (new User($this->getDB()))->getByUsername($_POST['username']);

        if($user === false){
            $_SESSION['wrong_credentials'] = true;
        }

        if (password_verify($_POST['password'], trim($user->user_password))) {
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
