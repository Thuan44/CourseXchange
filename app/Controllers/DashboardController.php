<?php

namespace App\Controllers;

use App\Models\Course;

class DashboardController extends Controller
{

    public function index()
    {
<<<<<<< HEAD
        // Rediriger vers page de login si pas de session
        if(!isset($_SESSION['authorization'])){
            return header('Location: /CourseXchange/login');
        }

=======
>>>>>>> 308081a8714cf07e24df0f390dee3f61dcf35847
        $course = new Course($this->getDB());
        $courses = $course->all();

        return $this->view('dashboard.index', compact('courses'));
    }

    public function show(int $id)
    {
        echo 'Je suis le post ' . $id;
    }
    
}
