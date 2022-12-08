<?php
namespace App\Controllers	;
    use System\Coeur\Controllers\Controller;
    class Concours extends Controller
    {
public function __construct()
{
$concours = 	$this->model('concours');
	$date_limite = $concours->get_limite(date("Y-m-d"));
if(!empty($date_limite))
{
foreach($date_limite as $valeur)
{
if($valeur['con_statut'] == 1)
{
$valeur['con_statut'] = 3;
$concours->update($valeur['con_id'],$valeur);
}
$datetime1 = new \DateTime(date('Y-m-d'));
$datetime2 = new \DateTime($valeur['con_date_fin']);
$interval = $datetime1->diff($datetime2);
if($valeur['con_statut'] == 4 and $interval->format('%a') >= 14)
{
$valeur['con_statut'] = 2;
$concours->update($valeur['con_id'],$valeur);
}
}
}
}

public function resultat()
{
$concours = $this->model();
$participation = $this->model("participation");
$correction = $this->model("correction");
$utilisateurs = $this->model('utilisateurs');
if(isset($_GET['concour']) and is_numeric($_GET['concour']) and !empty($concours->get($_GET['concour'])) and $concours->get($_GET['concour'])[0]->con_statut == 4)
{
$liste_participation = $participation->get_participation_concour($_GET['concour']);
foreach($liste_participation as $valeur)
{
	$valeur->par_utilisateur = $utilisateurs->get($valeur->par_utilisateur)[0]->uti_pseudo;
}
$this->view("concours","liste_participation","Résultat du concour ".$concours->get($_GET['concour'])[0]->con_titre,compact('liste_participation'));
}
else
{
$liste_concours = $concours->get_concour(4,compact("liste_correction"));
foreach($liste_concours as $liste)
{
	$liste->con_statut = $concours->get_statut($liste->con_statut)[0]->sta_nom;
}
$this->view("concours","resultats","Résultat des différents concours",compact("liste_concours"));
}
}

public function commentaire()
{
	$this->acces();
	$commentaire = $this->model("commentaires");
	if(isset($_POST['commentaire']))
	{
$_POST['com_utilisateur'] = $_SESSION['utilisateurs']['uti_pseudo'];
	$_POST['com_date'] = date("y-m-d");
	unset($_POST['commentaire']);
$concour = $_POST['com_concour'];
$commentaire->register($_POST);
header("Location: index.php?page=concours&action=voir&concour=$concour");
}
}

public function voir()
{
$concours = $this->model();
$commentaires = $this->model('commentaires');
$utilisateur = $this->model('utilisateurs');
$_GET['concour'] = $_GET['concour'] ?? "";
if(isset($_GET['concour']) and is_numeric($_GET['concour']) and $_GET['concour'] > 0 and isset($concours->get($_GET['concour'])[0]))
	{
$concour_get = $concours->get($_GET['concour'])[0];
$commentaires = $commentaires->get_commentaire($_GET['concour']);
$voir[0] = $concour_get;
$voir[1] = $commentaires;
foreach($voir[1] as $valeur)
{
$valeur->com_utilisateur = $utilisateur->get($valeur->com_utilisateur)[0]->uti_pseudo;
	}
$this->view("concours","voir",$voir[0]->con_titre,compact('voir'));
}
else
{
$_SESSION['message'][] = "ce concour n'existe pas ou il n'est plus disponible";
header("location: index.php?page=concours&action=accueil");
exit;
}
}

public function archive()
{
	$concour = $this->model();
$utilisateurs = $this->model('utilisateurs');
$archive = $concour->get_concour(2);
if(isset($_GET['action']) != "" and $_GET['action'] == "archive")
	{
	foreach($archive as $valeur)
	{
		$valeur->con_statut = $concour->get_statut($valeur->con_statut)[0]->sta_nom;
	$valeur->con_organisateur = $utilisateurs->get($valeur->con_organisateur)[0]->uti_pseudo;
	}
$this->view("concours","archive","Archive des concours",compact('archive'));
}
	}

		public function accueil()
{
           	 		   $concour = $this->model();
$participation = $this->model("participation");
$utilisateurs = $this->model("utilisateurs");
$accueil = $concour->get_concour(1);
	foreach($accueil as $valeur)
	{
if($valeur->con_date_debut <= date("Y-m-d") and !empty($accueil))
		{	
	$valeur->con_statut = $concour->get_statut($valeur->con_statut)[0]->sta_nom;
$valeur->con_organisateur = $utilisateurs->get($valeur->con_organisateur)[0]->uti_pseudo;
if(empty($participation->a_participer($valeur->con_id,$_SESSION['utilisateurs']['uti_id'])))
{
	$valeur->autorisation = "oui";
}
else
{
	$valeur->autorisation = "non";
}
		}
	}
if(empty($accueil))
    {
$accueil = [];
    }
    $this->view("concours","accueil","Nos concours",compact('accueil'));
    }

public function attente()
{
$concour = $this->model();
$utilisateurs = $this->model("utilisateurs");
$liste_attente = $concour->get_concour(3);
if(isset($_GET['action']) != "" and $_GET['action'] == "attente")
	{
	foreach($liste_attente as $valeur)
	{
		$valeur->con_statut = $concour->get_statut($valeur->con_statut)[0]->sta_nom;
	$valeur->con_organisateur = $utilisateurs->get($valeur->con_organisateur)[0]->uti_pseudo;
	}
$this->view("concours","attente","Les concours en attente de correction",compact('liste_attente'));
}
	}
}
