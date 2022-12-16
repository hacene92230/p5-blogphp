<?php

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Comments extends Controller
{
    //Allows you to add comments to an article. The article identifier is retrieved via the GET variable.
    public function new()
    {
        $comment = $this->model();
        if (isset($_POST['new'])) {
            //we set the approval to 0 that we add to the post table, then we add to the post table the identifier of the article to which we want to add the comment.
            $_POST['approval'] = 0;
            $_POST['user_id'] = $_SESSION['utilisateurs']['id'];
            $_POST['posts_id'] = $_GET['post'];
            unset($_POST['new']);
            $comment->register($_POST);
            header("location: index.php?page=posts&action=show&post=" . $_GET['post']);
            $_SESSION["message"][] = "Votre commentaire à bien été pris en compte, veuillez attendre ça validation";
        }
    }
}
