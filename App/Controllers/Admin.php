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
		$this->view('admin', 'show_comment', 'Liste des commentaires.', compact("comments"));
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
}
