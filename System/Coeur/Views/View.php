<?php

namespace System\Coeur\Views {

    class View
    {
                private $title;
        private $args = [];
        /**
         * Prepare une vue a rendre 
         * si les valeurs n'existe pas 
         * elle sont automatiquement créer
         * 
         * le titre sera e  titre de la page
         * la description la description de la page
         * les args les arguments a envoyer a la vue 
         *
         * @param string $view
         * @param string $directory
         * @param string $title
         * @param string $description
         * @param array $args
         */
        public function __construct(string $directory, string $view, string $title,array $args = [])
        {
            $this->args = $args;
            $this->title = $title;
                        $base = dirname(realpath('.')) . DIRECTORY_SEPARATOR . 'App';
            $view_dir = $base . DIRECTORY_SEPARATOR . 'Views';
$dir = $view_dir . DIRECTORY_SEPARATOR . $directory;            
            $layout = $view_dir . DIRECTORY_SEPARATOR . 'layout/layout.php';
            $this->layout = $layout;
            $view = $dir . DIRECTORY_SEPARATOR . "$view.php";
            if (!is_dir($dir)) {
                mkdir($dir);
            }
            if (!file_exists($view)) {
                touch($view);
            }
            if (!file_exists($layout)) {
                touch($layout);
            }
            $this->view = $view;
        }
        /**
         *
         * Rend la vue
         *
         * @return string
         */
        public function create(): string
        {
            ob_start();
            extract($this->args);          
            require($this->view);
           $content = ob_get_clean();
                                $title = $this->title;
                        ob_start();
                        require($this->layout);
                        return ob_get_clean();
        }
    }
}
