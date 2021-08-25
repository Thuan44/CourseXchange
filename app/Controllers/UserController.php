<?php

namespace App\Controllers;

class UserController extends Controller
{

    public function login(){
        return $this->view('authentication.login');
    }

    public function loginPost(){

    }
}
