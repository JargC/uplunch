<?php

class Model {

	public $table;

	/**
     * 
     * La fonction insert un enregistrement a partir du tableau associatif fourni en parametre
     * Les cle du tableau doivent correspondre aux nom des champ de la table
     * Le ou les champ de clé primaire ne doivent pas etre fourni s'il sont en auto increment
     * 
     * Si l'insertion reussie, la fonction renvoie le numero du dernier auto increment realise
     * 
     */
    public function insert($data){
        $dbh = new PDO('mysql:host=localhost;dbname=uplunch', 'root', '');
        // Je verifie que le tableau contient la liste des champs
        if(!isset($data['fields']) || (isset($data['fields']) && empty($data['fields']))){
            return FALSE;
        } else {
            $mysql1 = 'INSERT INTO ' . $this->table . '(';
            $mysql2 = 'VALUES(';
            foreach ($data['fields'] as $key => $value) {
                $mysql1 .= $key . ',';
                $mysql2 .= '\'' . $value . '\',';
            }
            $mysql = substr($mysql1, 0, -1) . ') ' . substr($mysql2, 0, -1) . ') ';
            // Compilation de la requete
            $req = $dbh->prepare($mysql);      
          
            // Execution de la requete
            try{
                $req->execute();
                // Je recupere le dernier id
                $retour = $dbh->lastInsertId();
            } catch (Exception $ex) {
                echo $ex->getMessage();
                $retour = FALSE;
            }
       }
       $dbh = null;
       return $retour;
    }

}