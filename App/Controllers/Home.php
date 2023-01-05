<?php

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Home extends Controller
{
    /**
     * Affiche la page d'accueil avec tous les articles.
     */
    public function home()
    {
        $postsModel = $this->model("Posts");
        $posts = $postsModel->get_all();
        $this->view('home', 'home', 'Accueil', compact("posts"));
    }
}
