r

<?php

require_once '../core/Model.php';
/**
*Classe qui permet de gérer les utilisateurs
*
*/
class User extends Model
{

	private $id;
	private $google_id;
	private $facebook_id;
	private $nom;
	private $prenom;
	private $mail;
	private $password;
	private $adresse;
	private $creation_date;
	private $filiere;
	private $photo;

	var $table = 'user';
	///////////////////////// Getters \\\\\\\\\\\\\\\\\\\\\\\\\

	public function getId()
	{
		return $this->id;
	}

	public function getGoogleId()
	{
		return $this->google_id;
	}

	public function getFacebookId()
	{
		return $this->facebook_id;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function getPrenom()
	{
		return $this->prenom;
	}

	public function getmail()
	{
		return $this->mail;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getAdresse()
	{
		return $this->adresse;
	}

	public function getCreationDate()
	{
		return $this->creation_date;
	}

	public function getFiliere()
	{
		return $this->filiere;
	}

	public function getPhoto()
	{
		return $this->photo;
	}

	/////////////////////// Setters \\\\\\\\\\\\\\\\\

	public function setId($id) {
        $this->id = $id;
        return TRUE;
    }

    public function setGoogleId($google_id) {
        $this->google_id = $google_id;
        return TRUE;
    }

    public function setFacebookId($facebook_id) {
        $this->facebook_id = $facebook_id;
        return TRUE;
    }

    public function setNom($last_name) {
        $this->nom = $last_name;
        return TRUE;
    }

     public function setPrenom($first_name) {
        $this->prenom = $first_name;
        return TRUE;
    }

    public function setMail($mail) {
    	$exp = '/^[[:alnum:]][[:alnum:]_.-]*@[[:alnum:]][[:alnum:]_.-]*\.[a-z]{2,6}$/';
        // J'elimine les blancs avant et apres et je passe en minuscules
        $mail = strtolower(trim($mail));
        // Je controle que le mail est valide
        if( preg_match($exp,$mail) ){
            $this->mail = $mail; 
        	return TRUE;
        }
        else return FALSE;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        return TRUE;
    }

    public function setAdresse($Adresse) {
        $this->adresse = $Adresse;
        return TRUE;
    }

    public function setCreationDate($creation_date) {
        $this->creation_date = $creation_date;
        return TRUE;
    }

    public function setFiliere($filiere) {
        $this->filiere = $filiere;
        return TRUE;
    }

    public function setPhoto($Photo) {
        $this->photo = $Photo;
        return TRUE;
    }
}
