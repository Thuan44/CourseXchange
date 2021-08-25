<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function login()
    {
        return $this->view('authentication.login');
    }

    public function loginPost()
    {

        #1 Data processing

        #2 Data validator
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
