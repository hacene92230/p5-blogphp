<?php

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Admin extends Controller
{
	/**
	 * Gère l'accueil de l'administration.
	 */
	public function home()
	{
		// Récupère la liste de tous les utilisateurs.
		$usersModel = $this->model('users');
		$listUsers = $usersModel->get_all();
		$this->view('admin', 'home', 'Administration', compact('listUsers'));
	}

	/**
	 * Affiche la liste de tous les commentaires.
	 */
	public function comment_show()
	{
		// Récupère tous les commentaires et ajoute le nom de l'auteur de chaque commentaire.
		$commentsModel = $this->model("comments");
		$comments = $commentsModel->get_all();
		foreach ($comments as $comment) {
			$comment->user_comment = $commentsModel->getFirstnameByCommentUser($comment->user_id);
		}
		$this->view('comments', "management", 'Liste des commentaires.', compact("comments"));
	}

	/**
	 * Permet de valider les commentaires qui ne sont pas encore validés.
	 */
	public function comment_validate()
	{
		if (isset($_GET['comment'])) {
			$data = ['approval' => 1];
			$this->model("comments")->update((int) $_GET['comment'], $data);
			header("location: index.php?page=admin&action=home");
			$_SESSION['message'][] = "Le commentaire a bien été validé";
		}
	}

	public function commentNoValidate(): void
	{
		$choix = ['approval' => 2];
		$this->model('comments')->update((int) $_GET['comment'], $choix);
		header('location: index.php?page=admin&action=home');
		$_SESSION['message'][] = 'Le commentaire à bien été refusé.';
	}

	public function commentDelete(): void
	{
		$this->model('comments')->delete((int) $_GET['comment']);
		header('location: index.php?page=admin&action=home');
		$_SESSION['message'][] = 'Le commentaire à bien été supprimé';
	}

	public function userRemove(): void
	{
		$this->model('users')->delete((int) $_GET['user']);
		$this->model('comments')->deleteCommentsOfUser($_GET['user']);
		header('location: index.php?page=admin&action=home');
		$_SESSION['message'][] = 'Le compte à bien été supprimé.';
	}
}
