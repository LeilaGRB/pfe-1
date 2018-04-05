<?php

require_once('dbconfig.php');

class USER
{

	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function runQuery1($sql)
	{
		$stmt = $this->conn->query($sql);
		return $stmt;
	}

	public function runQuery2($sql,$array)
	{
		try
		{
			//préparer la requete SQL pour insérer les données
			$stmt = $this->conn->prepare($sql);

            //éxécuter la requête SQL
            $stmt = $stmt->execute($array);

            if ($stmt) {
            	return true;
            }

		}
		catch(PDOException $e)
		{
			return false;
		}
		return false;
	}

      //fonction pour ajouter des nouveau compte soit etudiant ou enseignant
	public function inscription($array)
	{
		try
		{
			//préparer la requete SQL pour insérer les données
			$stmt = $this->conn->prepare("INSERT INTO comptes (login,mdp,user) VALUES (:email, :password, :user)");
            //initialiser un tableau avec les données à insérer
			$param = array(
              ':email' => $array['email'],
              ':password' => $array['password'],
              ':user' => $array['user']
            );

            //éxécuter la requête SQL
            $stmt = $stmt->execute($param);

            //si la requête à été bien éxecuté alors creer l'etudiant ou l'enseignant
            if ($stmt) {
            	if($array['user']=="Etudiant"){
            		//recuperie la moyenne de l'etudiant
			        $moy = $this->conn->query("SELECT id FROM moyennes WHERE code=\"".$array['code']."\"");
			        $moy=$moy->fetch();
		            //recuperie l'id de compte 
			        $compt = $this->conn->query("SELECT id FROM comptes WHERE login=\"".$array['email']."\" and mdp=\"".$array['password']."\"");
			        $compt=$compt->fetch();
			        //préparer la requete SQL pour insérer les données
			        $stmt = $this->conn->prepare("INSERT INTO etudiants (nom,code,prenom,specialite, moyenne_id,compt_id) VALUES (:nom, :code, :prenom, :specialite,:moyenne_id,:compt_id)");
                    //initialiser un tableau avec les données à insérer
			        $param = array(
                      ':nom' => $array['nom'],
                      ':code' => $array['code'],
                      ':prenom' => $array['prenom'],
                      ':specialite' => $array['specialite'],
                      ':moyenne_id' => $moy['id'],
                      ':compt_id' => $compt['id']
                    );

                    //éxécuter la requête SQL
                    $stmt = $stmt->execute($param);

            	}
            	if($array['user']=="Enseignant"){
            		
            	}
            }

            //si la requête à été bien éxecuté alors connecter
            if ($stmt) {
            	return true;
            }else{
            	return false;
            }

		}
		catch(PDOException $e)
		{
			return false;
		}
	}


	public function doLogin($uname,$upass)
	{
		try
		{
			$stmt = $this->conn->query("SELECT id,user FROM comptes WHERE login= '$uname' and mdp = '$upass'");
		    $userRow=$stmt->fetch();
			if($stmt->rowCount() == 1)
			{
			 $_SESSION['user_session'] = $userRow['id'];
			 $_SESSION['grade'] = $userRow['user'];
			 return true;
			}

		}
		catch(PDOException $e)
		{
			return false;
		}
	}



	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: /pfemaster/$url");
	}

	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>

