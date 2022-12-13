<?php

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Posts extends Controller
{
	//function to create a new article, no parameters are needed.
	public function new()
	{
		if (isset($_POST['new'])) {
			//For convenience, we extract all the variables from the array post
			extract($_POST);
			$tabuser = array(
				"title" => $title,
				"content" => $content
			);
			//once the data is ready to be sent, we call the article model and then we save our data in the database.
			$this->model()->register($tabuser);
			$_SESSION['message'][] = "l'article vient d'être créer";
		}
		$this->view('posts', 'new', 'Création d\'un nouvel article');
	}

	//Allows you to delete an item.
	public function delete()
	{
		//we retrieve all the articles already written in order to be able to store them in a table to send them to our view.
		$tabpost = $this->model()->get_all();
		if (isset($_POST['delete'])) {
			extract($_POST);
			$this->model()->delete($delete);
			$_SESSION['message'][] = "l'article vient d'être supprimer";
		}
		$this->view('posts', 'delete', 'Supprimer un articles', compact("tabpost"));
	}

	//allows you to edit an article
	public function edit()
	{
		if (isset($_POST['view_all'])) {
			//we retrieve the article that will have been chosen in the drop-down list then we display the view with the identifier in question.
			$look = $this->model()->get_id_post($_POST['view_all']);
			$this->view('posts', 'edit', 'éditer un articles', compact("look"));
		} elseif (isset($_POST['edit'])) {
			//we remove edit from the post table because otherwise the field would not exist because we will save the post table directly in the database.
			unset($_POST['edit']);
			$this->model()->update($_POST['id'], $_POST);
			header("location: index.php?page=posts&action=edit");
			$_SESSION['message'][] = "L'article à bien été mis à jours";
		} else {
			//we collect all the items. that we stoke in a table to make them visible.a
			$view_all = $this->model()->get_all();
			$this->view('posts', 'edit', 'éditer un articles', compact("view_all"));
		}
	}
}
