<?php

namespace App\Controllers;

class DashboardController extends Controller
{

    public function index()
    {
        return $this->view('dashboard.index');
    }

    public function show(int $id)
    {
        echo 'Je suis le post ' . $id;
    }
    
}
