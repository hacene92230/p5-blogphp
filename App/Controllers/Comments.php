 <?php

    namespace App\Controllers;

    use System\Coeur\Controllers\Controller;

    class Comments extends Controller
    {
        /**
         * Permet d'ajouter un commentaire à un article. L'identifiant de l'article est récupéré via la variable GET.
         */
        public function new(): void
        {
            $comment = $this->model();
            if (isset($_POST['new']) && isset($_SESSION['utilisateurs']['id']) && isset($_GET['post'])) {
                // On définit l'approbation à 0, puis on ajoute l'identifiant de l'utilisateur et de l'article à la table des commentaires.
                $data = [
                    'approval' => 0,
                    'user_id' => (int) $_SESSION['utilisateurs']['id'],
                    'posts_id' => (int) $_GET['post'],
                    'content' => $_POST["content"]
                ];
                $comment->register($data);
                header("location: index.php?page=posts&action=show&post=" . (int) $_GET['post']);
                $_SESSION["message"][] = "Votre commentaire à bien été pris en compte, veuillez attendre sa validation";
            }
        }
    }
