<?php

Class Controller {


     function __construct() {
        // on démarre la session
         
         //si la session existe, on met la session dans $this->session
         if(isset($_SESSION)){
            $this->session = $_SESSION;
         }
        //on met les donner de post dans data
        if (isset($_POST)) {
            $this->data = $_POST;
        }
        // ON  charge les models
        if (isset($this->models)) {
            foreach ($this->models as $val) {
                $this->loadModel($val);
            }
        }
    }

      // cette fonction permet d'appeler un model
    function loadModel($name) {
        require_once('models/' . ucfirst(strtolower($name)) . '.php');
        $this->$name = new $name();
    }

	 /**
     * 
     * @param string $mot
     *
     * 
     * La fonction retourne la valeur correspondante au mot donne en parametre dans les parametres POST
     * 
     * 
     */
    function recupPostParam($mot){
        // Initialisation de la valeur de retour
        $retour = '';
        if($mot != NULL || $mot !='' ){
            $mot = ((isset($_POST[$mot]))?($_POST[$mot]):(''));
        }
        return $retour;
    }
}