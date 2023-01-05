<?php

namespace System\Coeur\Controllers;

use Exception;
use System\Coeur\Models\Model;
use System\Coeur\Views\View;

class Controller
{
    /**
     * Instancie un model.
     *
     * Si le paramètre de la fonction est vide, le nom du controller sera utilisé automatiquement comme nom de modèle,
     * mais il devra exister dans le dossier model.
     *
     * @param string $model Nom du modèle à instancier
     *
     * @throws Exception Si le modèle demandé n'existe pas ou n'est pas une instance de la classe Model
     *
     * @return Model Instance du modèle demandé
     */
    public function model(string $model = ''): Model
    {
        $base = dirname(realpath('.')) . DIRECTORY_SEPARATOR . 'App';
        if (isset($model) && !empty($model)) {
            $model =  sprintf('App\Models\%s', ucfirst($model));
        } else {
            $part = explode('\\', get_class($this));
            $model = strval(end($part));
            $model = sprintf('App\Models\%s', ucfirst($model));
        }
        if (!is_dir($base . DIRECTORY_SEPARATOR . 'Models')) {
            throw new Exception("Le dossier du model n'existe pas.");
        }
        if (!class_exists($model)) {
            throw new Exception("le model demandé  n'existe pas");
        }
        return new $model();
    }

    /**
     * Affiche une vue.
     *
     * @param string $directory Répertoire contenant la vue
     * @param string $view Nom de la vue à afficher
     * @param string $title Titre de la vue
     * @param array $args Arguments à passer à la vue
     *
     * @return void
     */
    public function view(string $directory, string $view, string $title, array $args = []): void
    {
        echo (new View($directory, $view, $title, $args))->create();
    }
}
