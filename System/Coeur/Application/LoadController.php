<?php
namespace System\Coeur\Application {
    use Exception;
    class LoadController
    {
        private $action;
        private $controller;
       
        /**
         * Verifie les informations 
         * si il y as des erreurs des execptions sont renvoyer
         * arret du script
         *
         * @param string $controller
         * @param string $action
         */
        public function __construct(string $controller, string $action)
        {
            $this->controller = sprintf('App\Controllers\%s', ucfirst($controller));
            $this->action = $action;
            if (!class_exists($this->controller)) {
                throw new Exception(
                    sprintf(
                        "Le controlleur %s n'existe pas",
                        $controller
                    )
                );
            }
            if (!method_exists($this->controller, $this->action)) {
                throw new Exception("l'action n'existe pas");
            }
        }
        /**
         *
         * Appelle l'action du ccontroleur
         *
         * @return void
         */
        public function call()
        {
            session_start();
	    return call_user_func([new $this->controller, $this->action]);
        }
    }
}
