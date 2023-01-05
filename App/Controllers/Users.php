<?php

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Users extends Controller
{
	public function register(): void
	{
		// Vérifie si le formulaire d'inscription a été soumis.
		if (!isset($_POST['register'])) {
			$this->view('users', 'register', 'Inscription');
			return;
		}

		$errors = [];

		// Vérifie la longueur du prénom.
		if (strlen($_POST['firstname']) < 3) {
			$errors[] = "vous devez saisir un prénom de 3 caractères au minimum.";
		}

		// Vérifie si les mots de passe sont identiques.
		if ($_POST['password'] !== $_POST['password_confirm']) {
			$errors[] = "les deux mots de passes ne correspondent pas";
		}

		// Vérifie la longueur du mot de passe.
		if (strlen($_POST['password']) < 6) {
			$errors[] = "le mot de passe est trop court, il doit contenir au moins 6 caractères";
		}

		// Vérifie si le mot de passe contient un chiffre et une majuscule.
		if (!preg_match('/(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/', $_POST['password'])) {
			$errors[] = "le mot de passe doit contenir au moins un chiffre ainsi qu'une majuscule.";
		}

		// Si aucune erreur n'a été détectée, enregistre l'utilisateur.
		if (empty($errors)) {
			$tabUser = [
				'firstname' => $_POST['firstname'],
				'email' => $_POST['email'],
				'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
				'profil' => 1,
			];

			$userModel = $this->model();
			$userModel->register($tabUser);

			$_SESSION['message'][] = "votre inscription a bien été prise en compte";
			header("Location: index.php?page=users&action=login");
			return;
		}

		// Sinon, affiche les erreurs et le formulaire d'inscription.
		$_SESSION['message'] = $errors;
		$this->view('users', 'register', 'Inscription');
	}

	/**
	 * Connecte l'utilisateur.
	 *
	 * @return void
	 */
	public function login(): void
	{
		// Vérifie si le formulaire de connexion a été soumis.
		if (!isset($_POST['login'])) {
			$this->view('users', 'login', 'Connexion');
			return;
		}

		// Récupère l'utilisateur correspondant à l'adresse email saisie.
		$userModel = $this->model();
		$users = $userModel->findByEmail($_POST['email']);

		// Vérifie si l'utilisateur existe et si le mot de passe est correct.
		if (array_key_exists(0, $users) && $users[0]['email'] === $_POST['email'] && password_verify($_POST['password'], $users[0]['password'])) {
			$_SESSION['utilisateurs'] = $users[0];
			header("location: index.php");
			return;
		}

		// Sinon, affiche un message d'erreur.
		$_SESSION['message'][] = "Les informations fournies ne nous permettent pas de vous authentifier";
		header("Location: index.php?page=users&action=login");
		exit;
	}

	/**
	 * Modifie le profil de l'utilisateur connecté.
	 *
	 * @return void
	 */
	public function edit(): void
	{
		// Vérifie si le formulaire de modification du profil a été soumis.
		if (!isset($_POST['edit'])) {
			$this->view('users', 'profil', 'Mon profil', $_SESSION['utilisateurs']);
			return;
		}

		// Vérifie si l'utilisateur est connecté et si les champs "Nom", "Pseudo" et "Mot de passe" sont remplis.
		if (empty($_SESSION['utilisateurs']) || empty($_POST['firstname']) || empty($_POST['email'])) {
			$_SESSION['message'][] = "Les champs: Nom, Pseudo et mot de passe ne peuvent être vide";
			header("location: index.php?page=users&action=edit");
			exit;
		}

		// Si le mot de passe est vide, utilise le mot de passe existant. Sinon, hash le nouveau mot de passe.
		if (empty($_POST['password'])) {
			$_POST['password'] = $_SESSION['utilisateurs']['password'];
		} else {
			$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		}

		// Supprime la clé "edit" du tableau POST et met à jour le profil de l'utilisateur.
		unset($_POST['edit']);
		$userModel = $this->model();
		$userModel->update($_SESSION['utilisateurs']['id'], $_POST);

		// Met à jour les informations de l'utilisateur en session et affiche un message de confirmation.
		$_SESSION['utilisateurs'] = $userModel->findUser($_POST['email'])[0];
		$_SESSION['message'][] = "La modification de ton profil s'est bien déroulée";
		header("location: index.php?page=users&action=edit");
		exit;
		$_SESSION['utilisateurs'] = $userModel->findUser($_POST['email'])[0];
		$_SESSION['message'][] = "La modification de ton profil s'est bien déroulée";
		header("location: index.php?page=users&action=edit");
		exit;
	}

	/**
	 * Déconnecte l'utilisateur.
	 *
	 * @return void
	 */
	public function logout(): void
	{
		session_destroy();
		header("location: index.php");
	}

	/**
	 * Supprime le compte de l'utilisateur connecté.
	 *
	 * @return void
	 */
	public function delete(): void
	{
		if (!isset($_POST['supprimer'])) {
			return;
		}

		$userModel = $this->model();
		$userModel->delete($_SESSION['utilisateurs']['id']);
		$_SESSION['message'][] = "La suppression de votre compte à bien été prise en compte, celle-ci à un effet immédiat";
		header("Location: index.php");
		exit;
	}
}
