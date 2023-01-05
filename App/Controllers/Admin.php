<?php

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Admin extends Controller
{
	//Manages the home of the administration.
	public function home()
	{
		//we retrieve the list of all users.
		$users = $this->model('users');
		$liste_user = $users->get_all();
		$this->view('admin', 'home', 'Administration', compact('liste_user'));
	}

	//Collect all comments.
	public function comment_show()
	{
		//We take all the comments to store them in a table.
		$comments = $this->model("comments")->get_all();
		foreach ($comments as $valeur) {
			$valeur->user_comment = $this->model("comments")->getFirstnameByCommentUser($valeur->user_id);
		}
		$this->view('comments', "management", 'Liste des commentaires.', compact("comments"));
	}

	//allows you to validate comments that are not yet validated.
	public function comment_validate()
	{
		$choix["approval"] = 1;
		$this->model("comments")->update($_GET['comment'], $choix);
		header("location: index.php?page=admin&action=home");
		$_SESSION['message'][] = "Le commentaire à bien été valider";
	}

	public function comment_no_validate()
	{
		$choix["approval"] = 2;
		$this->model("comments")->update($_GET['comment'], $choix);
		header("location: index.php?page=admin&action=home");
		$_SESSION['message'][] = "Le commentaire à bien été refuser.";
	}

	public function comment_delete()
	{
		$this->model("comments")->delete($_GET["comment"]);
		header("location: index.php?page=admin&action=home");
		$_SESSION['message'][] = "Le commentaire à bien été supprimer";
	}

	public function user_remove()
	{
		$this->model("comments")->delete_comment_of_user($_GET["user"]);
		$this->model("users")->delete($_GET['user']);

		header("location: index.php?page=admin&action=home");
		$_SESSION['message'][] = "Le compte à bien été supprimer.";
	}
}
