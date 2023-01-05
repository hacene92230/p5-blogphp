<?php

declare(strict_types=1);

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Posts extends Controller
{
	public function new(): void
	{
		if (isset($_POST['new'])) {
			$title = $_POST['title'] ?? '';
			$content = $_POST['content'] ?? '';

			$tabuser = [
				"title" => $title,
				"content" => $content,
			];

			$this->model()->register($tabuser);
			$_SESSION['message'][] = "L'article vient d'être créé";
		}

		$this->view('posts', 'new', 'Création d\'un nouvel article');
	}

	public function delete(): void
	{
		$tabpost = $this->model()->get_all();

		if (isset($_POST['delete'])) {
			$delete = $_POST['delete'] ?? '';
			$this->model()->delete($delete);
			$_SESSION['message'][] = "L'article vient d'être supprimé";
		}

		$this->view('posts', 'delete', 'Supprimer un articles', compact("tabpost"));
	}

	public function edit(): void
	{
		if (isset($_POST['view_all'])) {
			$viewAll = $_POST['view_all'] ?? '';
			$look = $this->model()->get_id_post($viewAll);
			$this->view('posts', 'edit', 'éditer un articles', compact("look"));
		} elseif (isset($_POST['edit'])) {
			$id = $_POST['id'] ?? '';
			$data = $_POST;
			unset($data['edit']);
			$this->model()->update($id, $data);
			header("location: index.php?page=posts&action=edit");
			$_SESSION['message'][] = "L'article à bien été mis à jour";
		} else {
			$viewAll = $this->model()->get_all();
			$this->view('posts', 'edit', 'éditer un articles', compact("viewAll"));
		}
	}

	public function show_comments(): array
	{
		$postId = intval($_GET['post']) ?? '';
		return $this->model("comments")->getApproved_CommentsByPost($postId);
	}

	public function show(): void
	{
		$postId = intval($_GET['post']) ?? '';
		$showTab = $this->model()->getPostById($postId)[0] ?? [];

		if ($showTab) {
			$showComments = $this->show_comments();
			$this->view('posts', 'show', $showTab["title"], compact("showTab", "showComments"));
		}
	}
}
