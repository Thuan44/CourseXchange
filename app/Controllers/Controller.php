<?php

namespace App\Controllers;

abstract class Controller
{

    // Rend la view avec le layout. Le path en 1er param, le 2nd param est un tableau de la bdd si besoin
    protected function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }
}
