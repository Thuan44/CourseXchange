<?php

namespace App\Controllers;

use App\Models\Course;

class DashboardController extends Controller
{

    public function index()
    {
        // Rediriger vers page de login si pas de session
        if(!isset($_SESSION['authorization'])){
            return header('Location: /CourseXchange/login');
        }

        $course = new Course($this->getDB());
        $courses = $course->all();

        return $this->view('dashboard.index', compact('courses'));
    }

    public function show(int $id)
    {
        echo 'Je suis le post ' . $id;
    }
    
}
