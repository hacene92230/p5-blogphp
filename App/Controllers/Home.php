<?php

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Home extends Controller
{
	public function home()
	{
		$tabpost = $this->model("posts")->get_all();
		$this->view('home', 'home', 'Accueil', compact("tabpost"));
	}

	public function contact()
	{
		if (isset($_POST['contact'])) {
			$msg_complet = '<p>Message reçu: <br />' . $_POST['con_contenu'] . '</p>' .
				"<p>Message envoyé de la part de : " . $_POST['con_prenom'] . '</p>' .
				'<p>Voici son email pour lui répondre: ' . $_POST['con_email'] . '</p>';
			$this->mail($_POST['con_objet'], $msg_complet);
			$_SESSION['message'][] = "votre message à bien été envoyé";
			header("Location: index.php");
			exit;
		}
		$this->view('home', 'contact', 'Contactez-nous culture du savoir');
	}
}
