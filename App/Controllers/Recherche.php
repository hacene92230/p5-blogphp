<?php

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Recherche extends Controller
{
    public function accueil()
    {
        $recherche[] = $_POST['recherche'];
        $this->view("accueil", "recherche", "Rechercher sur le site", compact('recherche'));
    }
}
