<?php

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Posts extends Controller
{
	public function new()
	{
		if (isset($_POST['new'])) {
			extract($_POST);
			$tabuser = array(
				"title" => $title,
				"content" => $content
			);
			var_dump($tabuser);
			$this->model()->register($tabuser);
		}
		$this->view('posts', 'new', 'Articles');
	}
}
