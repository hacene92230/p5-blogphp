<?php

namespace System\Coeur\Views;

class View
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var array
     */
    private $args = [];

    /**
     * @var string
     */
    private $layout;

    /**
     * @var string
     */
    private $view;

    /**
     * Prépare une vue à rendre.
     * Si les valeurs n'existent pas, elles sont automatiquement créées.
     *
     * Le titre sera le titre de la page, la description la description de la page
     * et les args les arguments à envoyer à la vue.
     *
     * @param string $view
     * @param string $directory
     * @param string $title
     * @param string $description
     * @param array $args
     */
    public function __construct(string $directory, string $view, string $title, array $args = [])
    {
        $this->args = $args;
        $this->title = $title;
        $base = dirname(realpath('.')) . DIRECTORY_SEPARATOR . 'App';
        $viewDir = $base . DIRECTORY_SEPARATOR . 'Views';
        $dir = $viewDir . DIRECTORY_SEPARATOR . $directory;
        $layout = $viewDir . DIRECTORY_SEPARATOR . 'layout/layout.php';
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
     * Rend la vue.
     /*
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
