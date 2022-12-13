<?php

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Users extends Controller
{
	public function register()
	{
		if (isset($_POST['register'])) {
			extract($_POST);
			if (strlen($firstname) < 3)
				$_SESSION['message'][] = "vous devez saisir un prénom de 3 caractères au minimum.";
			if ($password != $password_confirm)
				$_SESSION['message'][] = "les deux mot de passes ne correspondent pas";
			if (strlen($password) < 6)
				$_SESSION['message'][] = "le mot de passe   est trop cours, il doit contenir au moins 6 caractères";
			if (!preg_match('/(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/', $password))
				$_SESSION['message'][] = "le mot de passe doit contenir au moins un chiffre ainsi qu'une majuscule.";
			if (empty($_SESSION['message'])) {
				$tabuser = array(
					'firstname' => $firstname,
					'email' => $email,
					'password' => password_hash($password, PASSWORD_DEFAULT),
					"profil" => 1
				);
				$user = $this->model();
				$user->register($tabuser);
				$_SESSION['message'][] = "votre inscription à bien été prise en compte";
				header("Location: index.php?page=users&action=login");
			} else {
				$this->view('users', 'register', 'Inscription');
			}
		} else {
			$this->view('users', 'register', 'Inscription');
		}
	}

	public function login()
	{
		if (isset($_POST['login'])) {
			extract($_POST);
			$users = $this->model()->find_user($email);
			if (array_key_exists(0, $users) and $users[0]['email'] == $email and password_verify($password, $users[0]['password'])) {
				$_SESSION['utilisateurs'] = $users[0];
				header("location: index.php");
			} else {
				$_SESSION['message'][] = "Les informations fournies ne nous permettent pas de vous authentifier";
				header("Location: index.php?page=users&action=login");
				exit;
			}
		} else {
			$this->view('users', 'login', 'Connexion');
		}
	}

	public function edit()
	{
		if (isset($_POST["edit"])) {
			extract($_POST);
			$profil = $this->model();
			if (empty($_SESSION['utilisateurs']) and empty($firstname) or empty($email)) {
				$_SESSION['message'][] = "Les champs: Nom, Pseudo et mot de passe ne peuvent être vide";
				header("location: index.php?page=users&action=edit");
				exit;
			} else {
				if (!empty($password)) {
					$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				} else {
					$_POST['password'] = $_SESSION['utilisateurs']['password'];
				}
				unset($_POST['edit']);
				$profil->update($_SESSION['utilisateurs']['id'], $_POST);
				$_SESSION['utilisateurs'] = $profil->find_user($email)[0];
				$_SESSION['message'][] = "la modification de ton profil s'est bien déroulée";
				header("location: index.php?page=users&action=edit");
				exit;
			}
		} else {
			$this->view('users', 'profil', 'Mon profil', $_SESSION['utilisateurs']);
		}
	}

	public function logout()
	{
		session_destroy();
		header("location: index.php");
	}

	public function delete()
	{
		$delete = $this->model();
		if (isset($_POST['supprimer'])) {
			$delete->delete($_SESSION['utilisateurs']['id']);
			$_SESSION['message'][] = "La suppression de votre compte à bien été prise en compte, celle-ci à un effet immédiat";
			header("Location: index.php");
			exit;
		}
	}
}
