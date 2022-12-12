<?php

namespace App\Controllers;

use System\Coeur\Controllers\Controller;

class Admin extends Controller
{
	public function debannir()
	{
		$debannir = $this->model('bannis');
		if (isset($_GET['ban']) and is_numeric($_GET['ban'])) {
			if (!empty($debannir->get($_GET['ban']))) {
				$debannir->delete($_GET['ban']);
				$_SESSION['message'][] = "Le compte à bien été débanni";
				header("Location: index.php?page=admin");
				exit;
			} else {
				$_SESSION['message'][] = "Ce bannissement n'existe pas";
				header("Location: index.php?page=admin");
				exit;
			}
		} else {
			$_SESSION['message'][] = "L'identifiant du débannissement doit être une valeur numérique strictement positive";
			header("Location: index.php?page=admin");
			exit;
		}
	}

	public function bannir()
	{
		$utilisateurs = $this->model('utilisateurs');
		if (isset($_GET['utilisateur']) and is_numeric($_GET['utilisateur'])) {
			$bannir = $utilisateurs->get($_GET['utilisateur']);
			if (!empty($bannir)) {
				if (isset($_POST['bannir'])) {
					$bannis = $this->model('bannis');
					if (empty($bannis->get_ban($_GET['utilisateur']))) {
						$_POST['ban_utilisateur'] = $_GET['utilisateur'];
						unset($_POST['bannir']);
						$bannis->register($_POST);
						$_SESSION['message'][] = "L'utilisateur " . $bannir[0]->uti_pseudo . " à bien été banni";
						header("Location: index.php?page=admin");
						exit;
					} else {
						$_POST['ban_utilisateur'] = $_GET['utilisateur'];
						unset($_POST['bannir']);
						$bannis->update($bannis->get_ban($_GET['utilisateur'])[0]->ban_id, $_POST);
						$_SESSION['message'][] = "Le bannissement de l'utilisateur" . $bannir[0]->uti_pseudo . " à bien été modifier";
						header("Location: index.php?page=admin");
						exit;
					}
				} else {
					$this->view('admin', 'bannir', 'bannissement de ' . $utilisateurs->get($_GET['utilisateur'])[0]->uti_pseudo, compact('bannir'));
				}
			} else {
				$_SESSION['message'][] = "Cet utilisateur n'existe pas";
				header("Location: index.php?page=admin");
				exit;
			}
		} else {
			$_SESSION['message'][] = "t'utilisateur doit être fourni sous une valeur numérique";
			header("Location: index.php?page=admin");
			exit;
		}
	}

	public function modifier()
	{
		$utilisateurs = $this->model('utilisateurs');
		if (isset($_GET['utilisateur']) and is_numeric($_GET['utilisateur']) and $_GET['action'] == 'modifier' and !empty($utilisateurs->get($_GET['utilisateur'])) and $utilisateurs->get($_GET['utilisateur'])[0]->uti_id == $_GET['utilisateur']) {
			if (isset($_POST['modifier'])) {
				unset($_POST['modifier']);
				$_POST['uti_mdp'] = $utilisateurs->get($_GET['utilisateur'])[0]->uti_mdp;
				$utilisateurs->update($_GET['utilisateur'], $_POST);
				$_SESSION['message'][] = $_POST['uti_pseudo'] . " à bien été modifié";
				header("Location: index.php?page=admin&action=accueil");
				exit;
			} else {
				$modifier = $utilisateurs->get($_GET['utilisateur']);
				$this->view('admin', 'modifier_utilisateur', "modifier l'utilisateur " . $utilisateurs->get($_GET['utilisateur'])[0]->uti_pseudo, compact("modifier"));
			}
		}
	}

	public function accueil()
	{
		$users = $this->model('users');
		$liste_user = $users->get_all();

		$this->view('admin', 'accueil', 'Administration', compact("liste_user"));
	}

	public function supprimer()
	{
		$user = $this->model('uusers');
		if (isset($_GET['utilisateur']) and is_numeric($_GET['utilisateur']) and $_GET['action'] == 'supprimer' and !empty($utilisateurs->get($_GET['utilisateur'])) and $utilisateurs->get($_GET['utilisateur'])[0]->uti_id == $_GET['utilisateur']) {
			$utilisateurs->delete($_GET['utilisateur']);
			$_SESSION['message'][] = "L'utilisateur " . $_GET['utilisateur'] . " à bien été supprimé";
			header("Location: index.php?page=admin&action=accueil");
		}
	}
}
