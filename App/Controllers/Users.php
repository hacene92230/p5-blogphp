<?php
namespace App\Controllers;
use System\Coeur\Controllers\Controller;
class Users extends Controller
{
public function history()
	{
$this->acces();
$historique = $this->model("participation")->get_participation($_SESSION['utilisateurs']['uti_id']);
		foreach($historique as $participation)
		{
	if($participation->par_validitee == 1)
			{
$participation->par_validitee = "modifiable";
			}
else
{	
$participation->par_validitee = "non modifiable";
		}
		}
$this->view("utilisateurs","historique","Mon historique",compact('historique'));
	}

	public function login()
	{
		if (isset($_POST['authentification']))
		{
			extract($_POST);
			$users = $this->model()->find_user($uti_pseudo);
			if (array_key_exists(0, $users) and $users[0]['uti_pseudo'] == $uti_pseudo and password_verify($uti_mdp, $users[0]['uti_mdp']))
	{
					$_SESSION['utilisateurs'] = $users[0];
					header("location: index.php");
	}
		 else
		 {
				$_SESSION['message'][] = "Les informations fournies ne nous permettent pas de vous authentifier";
header("Location: index.php?page=utilisateurs&action=authentification");
exit;
			}
		} else {
			$this->view('utilisateurs', 'authentification', 'Connexion');
		}
	}

	public function register()
	{
		if (isset($_POST['uti_inscription'])) {
			extract($_POST);
			if ($uti_nom == "" or strlen($uti_nom) < 3)
				$_SESSION['message'][] = "vous devez saisir un nom d'au moins 3 caractères.";
			if ($uti_pseudo == "" or strlen($uti_pseudo) < 3)
				$_SESSION['message'][] = "le pseudo est invalide: votre saisie est inférieur à 4 caractères.";
			if ($uti_mdp != $uti_mdp_confirm)
				$_SESSION['message'][] = "les deux mot de passes ne correspondent pas";
			if (strlen($uti_mdp) < 6)
				$_SESSION['message'][] = "le mot de passe   est trop cours, il doit contenir au moins 6 caractères";
			if (!preg_match('/(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/', $uti_mdp))
				$_SESSION['message'][] = "le mot de passe doit contenir au moins un chiffre ainsi qu'une majuscule.";
			if (empty($_SESSION['message'])) {
				$user = array(
					'uti_nom' => $uti_nom,
					'uti_prenom' => $uti_prenom,
					"uti_profil" => 1,
					'uti_email' => $uti_email,
					'uti_pseudo' => $uti_pseudo,
					'uti_mdp' => password_hash($uti_mdp, PASSWORD_DEFAULT),
					'uti_date_inscription' => $uti_date_inscription,
					'uti_age' => $uti_age,
					'uti_pays' => $uti_pays);
				$utilisateur = $this->model();
			if(empty($utilisateur->get_admin(3)))
			{
$user['uti_profil'] = 3;
			}
				$utilisateur->register($user);
				$_SESSION['message'][] = "votre inscription à bien été prise en compte";
				header("Location: index.php?page=utilisateurs&action=authentification");
			} else {
				$this->view('utilisateurs', 'inscription', 'Inscription');
			}
		} else {
			$this->view('utilisateurs', 'inscription', 'Inscription');
		}
	}

	public function logout()
	{
		session_destroy();
		header("location: index.php");
	}

	public function profile()
	{
$this->acces();
$profil = $this->model();
			
			if(isset($_GET['souhait']) and $_GET['souhait'] == "supprimer")
		{
			$profil->delete($_SESSION['utilisateurs']['uti_id']);
		$_SESSION['message'][] = "La suppression de votre compte à bien été prise en compte, celle-ci à un effet immédiat";
				header("Location: index.php");
				exit;
		}
		if (isset($_POST["edit"])) {
if(!array_key_exists("uti_date_inscription", $_POST) or !array_key_exists("uti_id", $_SESSION['utilisateurs']) or !array_key_exists("uti_pseudo", $_POST) or !array_key_exists("uti_mdp", $_POST) or !array_key_exists("uti_nom", $_POST))
{
	$_SESSION['message'][] = "Les champs: Nom, Pseudo et mot de passe ne peuvent être vide";
					$this->view('utilisateurs', 'profil', 'Mon profil', $_SESSION['utilisateurs']);
exit;
}
			else
			{
			if(!empty($_POST['uti_mdp']))
			{
			$_POST['uti_mdp'] = password_hash($_POST['uti_mdp'], PASSWORD_DEFAULT);
			}
			else
			{
			$_POST['uti_mdp'] = $_SESSION['utilisateurs']['uti_mdp'];
			}
extract($_SESSION['utilisateurs']);
			unset($_POST['edit']);
$profil->update($uti_id,$_POST);
			$_SESSION['utilisateurs'] = $profil->find_user($uti_pseudo)[0];
			$_SESSION['message'][] = "la modification de ton profil s'est bien déroulée";
			header("location: index.php");
			exit;
		}
		}
		else
		{
		$this->view('utilisateurs', 'profil', 'Mon profil', $_SESSION['utilisateurs']);
		}
	}
}
