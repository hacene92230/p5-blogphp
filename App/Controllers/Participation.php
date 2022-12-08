<?php
namespace App\Controllers;
  use System\Coeur\Controllers\Controller;
    class Participation extends Controller
    {
        public function consulter()
{
$concour = $this->model("concours");
$participation = $this->model('participation');
$utilisateur = $this->model('utilisateurs');
if(is_numeric($_GET['participation']) and !empty($participation->get($_GET['participation'])[0]))
{
$consulter_participation = $participation->get($_GET['participation']);
foreach($consulter_participation as $valeur)
{
	$valeur->par_utilisateur = $utilisateur->get($valeur->par_utilisateur)[0]->uti_pseudo;
if(!empty($valeur->par_fichier))
{
	$valeur->par_fichier = fopen("upload/$valeur->par_fichier", 'r');
$lecture = [];
while (!feof($valeur->par_fichier))
{
$ligne = "<p>".fgets($valeur->par_fichier)."</p>";
array_push($lecture, $ligne);
}
fclose($valeur->par_fichier);
}
}
$consulter_participation[1] = $lecture;
$this->view("concours","consulter","Consulter  votre participation au concour ".$concour->get($participation->get($_GET['participation'])[0]->par_concour)[0]->con_titre,compact('consulter_participation'));
}
else
{
header("Location: index.php?page=concours&action=resultat");
}
}

	public function supprimer()
{
$this->acces();
$_SESSION["message"] = [];
if(isset($_GET['participation']) and is_numeric($_GET['participation']) and $_GET['participation'] > 0)
{
$participation = $this->model();
if(!empty($participation->get($_GET['participation'])))
{
$info_user = $participation->get($_GET['participation'])[0]->par_utilisateur == $_SESSION['utilisateurs']['uti_id'];
	$info_statut = $participation->get($_GET['participation'])[0]->par_validitee == 0;
	if($info_user == "true" and $info_statut == "true")
	{
$participation->delete($_GET['participation']);
$_SESSION["message"][] = "Votre participation à été supprimé";
header('Location: index.php?page=utilisateurs&action=historique');
exit;
}
else
{
$_SESSION['message'][] = "Impossible de   supprimer cette participation";
header("Location: index.php?page=utilisateurs&action=historique");
exit;
}
}
else
{
$_SESSION['message'][] = "aucune participation n'existe avec cette identifient";
header("Location: index.php?page=utilisateurs&action=historique");
exit;
}
}
else
{
	$_SESSION['message'][] = "L'identifiant d'une participation doit être un nombr  strictement positif";
header("Location: index.php?page=utilisateurs&action=historique");
exit;
}
}

		public function participer()
		{
			$this->acces();
			
			$participation = $this->model("participation");
					$concour = $this->model("concours");
if(empty($_GET['concour']) or !is_numeric($_GET['concour']))
{
	$_SESSION['message'][] = "tu ne peut pas exécuté cette action";
	header("Location: index.php?page=concours");
	exit;
}
if(!empty($participation->a_participer($_GET['concour'],$_SESSION['utilisateurs']['uti_id'])))
{
						$_SESSION['message'][] = "tu ne peut pas participer deux fois au même concour, cependant tu peut modifier le contenu de ta participation";
						header("Location: index.php?page=concours");
						exit;
}
$concour_dispo = $concour->get($_GET['concour']);
if(!empty($concour_dispo) and $concour_dispo[0]->con_statut == 1)
{
if(isset($_FILES['par_fichier']['name']) and !empty($_FILES['par_fichier']['name']))
{
$dossier = 'upload/';
     $fichier = $_SESSION['utilisateurs']['uti_id'].'_'.$_GET['concour'].'_'.date('y-m-d').'_'.basename($_FILES['par_fichier']['name']);
$extansion = array("txt", "rtf", "pdf", "docx", "odt", "doc", "mp3", "wav");
if(!in_array(explode('.', $fichier)[1], $extansion))
	{
		$_SESSION['message'][] = 'Une erreur est survenue';
     header("Location: index.php?page=concours&action=accueil");
 exit;
	}
	else
	{
		move_uploaded_file($_FILES['par_fichier']['tmp_name'], $dossier . $fichier);
	}
}
	if(!empty($_POST['par_texte']) or !empty($_FILES['par_fichier']['name']))
	{
		unset($_POST['participer']);
unset($_POST['MAX_FILE_SIZE']);
$_POST['par_utilisateur'] = $_SESSION['utilisateurs']['uti_id'];
$_POST['par_fichier'] = $fichier;
$_POST['par_validitee'] = 1;
$_POST['par_date'] = date('Y-m-d');
$_POST['par_concour'] = $_GET['concour'];
$participation->register($_POST);
$_SESSION['message'][] = "votre participation à bien été prise en compte";
header("location: index.php?page=concours");
exit;
}
}
	else
	{
		$_SESSION['message'][] = "tu ne peut pas participer à un concour qui n'est pas ouvert";
						header("Location: index.php?page=concours");
						exit;
}
	$this->view("concours","participer","Participer à un concour");
		}
}
