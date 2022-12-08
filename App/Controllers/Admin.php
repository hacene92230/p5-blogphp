<?php
namespace App\Controllers;
  use System\Coeur\Controllers\Controller;
    class Admin extends Controller
    {
public function correction()
{
$this->acces("true");
$concour = $this->model("concours");
$participation = $this->model('participation');
$utilisateur = $this->model('utilisateurs');
$correction = $this->model("correction");
$liste_participation = $participation->get_participation_validitee(1);
foreach($liste_participation as $valeur)
{
$valeur->par_nb = $participation->count($valeur->par_concour);
$valeur->par_concour = $concour->get($valeur->par_concour)[0]->con_titre;
	$valeur->par_utilisateur = $utilisateur->get($valeur->par_utilisateur)[0]->uti_pseudo;
}
if($_GET['participation'] and is_numeric($_GET['participation']) and !empty($participation->get($_GET['participation'])[0]) and $participation->get($_GET['participation'])[0]->par_validitee == 1 and $concour->get($participation->get($_GET['participation'])[0]->par_concour)[0]->con_statut == 3)
{
if(empty($correction->get_correction($_GET['participation'])))
{
$consulter_participation = $participation->get($_GET['participation']);
$consulter_participation[0]->con_neurone = $concour->get($participation->get($_GET['participation'])[0]->par_concour)[0]->con_neurone;
if(isset($_POST['corriger']) and empty($correction->get_correction($_GET['participation'])))
{
$_POST['cor_date'] = date("Y-m-d");
$_POST['cor_participation'] = $_GET['participation'];
$_POST['cor_correcteur'] = $_SESSION['utilisateurs']['uti_id'];
unset($_POST['corriger']);
$participation_register['par_validitee'] = 0;
$participation->update($_GET['participation'],$participation_register);
$correction->register($_POST);
if($participation->count($participation->get($_GET['participation'])[0]->par_concour) <= 0)
{	
$concour_register['con_statut'] = 4;
$concour->update($participation->get($_GET['participation'])[0]->par_concour,$concour_register);
$_SESSION['message'][] = "Cette participation à été la dernière du concour, celui-ci passe donc au statu d'entièrement corrigé";
header("Location: index.php?page=admin&action=correction");
exit;
}
$_SESSION['message'][] = "merci d'avoir corrigé cette participation";
header("Location: index.php?page=admin&action=correction");
exit;
}
else
{
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
$this->view("admin","correction_form","Correction du concour ".$concour->get($participation->get($_GET['participation'])[0]->par_concour)[0]->con_titre." pour l'utilisateur ".$utilisateur->get($participation->get($_GET['participation'])[0]->par_utilisateur)[0]->uti_pseudo,compact('consulter_participation'));
}
}
else
{
	$_SESSION['message'][] = "cette participation à déjà été corriger";
	header("Location: index.php?page=admin&action=correction");
}
}
else
{
$this->view("admin","participation_display","Corriger les concours",compact('liste_participation'));
}
}

public function debannir()
{
$this->acces("true");
$debannir = $this->model('bannis');
if(isset($_GET['ban']) and is_numeric($_GET['ban']))
{
if(!empty($debannir->get($_GET['ban'])))
{
$debannir->delete($_GET['ban']);
	$_SESSION['message'][] = "Le compte à bien été débanni";
	header("Location: index.php?page=admin");
exit;
}
else
{
	$_SESSION['message'][] = "Ce bannissement n'existe pas";
	header("Location: index.php?page=admin");
exit;
}
}
else
{
	$_SESSION['message'][] = "L'identifiant du débannissement doit être une valeur numérique strictement positive";
	header("Location: index.php?page=admin");
exit;
}
}

public function bannir()
{
$this->acces("true");
$utilisateurs= $this->model('utilisateurs');
if(isset($_GET['utilisateur']) and is_numeric($_GET['utilisateur']))
{
$bannir = $utilisateurs->get($_GET['utilisateur']);
if(!empty($bannir))
{
if(isset($_POST['bannir']))
{
$bannis = $this->model('bannis');
if(empty($bannis->get_ban($_GET['utilisateur'])))
{
$_POST['ban_utilisateur'] = $_GET['utilisateur'];
unset($_POST['bannir']);
	$bannis->register($_POST);
$_SESSION['message'][] = "L'utilisateur ".$bannir[0]->uti_pseudo." à bien été banni";
header("Location: index.php?page=admin");
exit;
}
else
{
$_POST['ban_utilisateur'] = $_GET['utilisateur'];
unset($_POST['bannir']);
	$bannis->update($bannis->get_ban($_GET['utilisateur'])[0]->ban_id,$_POST);
$_SESSION['message'][] = "Le bannissement de l'utilisateur".$bannir[0]->uti_pseudo." à bien été modifier";
header("Location: index.php?page=admin");
exit;
}
}
else
{
$this->view('admin','bannir','bannissement de '.$utilisateurs->get($_GET['utilisateur'])[0]->uti_pseudo,compact('bannir'));
}
}
else
{
	$_SESSION['message'][] = "Cet utilisateur n'existe pas";
header("Location: index.php?page=admin");
exit;
}
}
else
{
$_SESSION['message'][] = "t'utilisateur doit être fourni sous une valeur numérique";
header("Location: index.php?page=admin");
exit;
}}

public function modifier()
	{
    $this->acces("true");
  $utilisateurs = $this->model('utilisateurs');
    $concours = $this->model('concours');
if(isset($_GET['utilisateur']) and is_numeric($_GET['utilisateur']) and $_GET['action'] == 'modifier' and !empty($utilisateurs->get($_GET['utilisateur'])) and $utilisateurs->get($_GET['utilisateur'])[0]->uti_id == $_GET['utilisateur'])
{
if(isset($_POST['modifier']))
{
unset($_POST['modifier']);
$_POST['uti_mdp'] = $utilisateurs->get($_GET['utilisateur'])[0]->uti_mdp;
$utilisateurs->update($_GET['utilisateur'],$_POST);
$_SESSION['message'][] = $_POST['uti_pseudo']." à bien été modifié";
        header("Location: index.php?page=admin&action=accueil");
exit;
}
else
{	
$modifier = $utilisateurs->get($_GET['utilisateur']);
$this->view('admin','modifier_utilisateur',"modifier l'utilisateur ".$utilisateurs->get($_GET['utilisateur'])[0]->uti_pseudo,compact("modifier"));
}
}
if(isset($_GET['concour']) and $_GET['action'] == 'modifier' and is_numeric($_GET['concour']) and !empty($concours->get($_GET['concour'])))
{
if(isset($_POST['modifier']))
{
if($_POST['con_date_debut'] <= $_POST['con_date_fin'])
{
$_POST['con_organisateur'] = $_SESSION['utilisateurs']['uti_pseudo'];
unset($_POST['modifier']);
$concours->update($_GET['concour'], $_POST);
$_SESSION['message'][] = "Le concour ".$concours->get($_GET['concour'])[0]->con_titre." à bien été modifier";
    header("Location: index.php?page=admin&action=accueil");
    }
    else
    {
	    $_SESSION['message'][] = "Erreur, la date du début du concour ne peut être supérieur à celle de la fin du concour";
    header("Location: index.php?page=admin&action=accueil");
    }
}
else
{
$modifier = $concours->get($_GET['concour']);
$this->view('admin','modifier_concour',"modifier le concour ".$concours->get($_GET['concour'])[0]->con_titre,compact("modifier"));
}
    }
}

        public function accueil()
        {
				   $this->acces("true");
				   $utilisateurs = $this->model('utilisateurs');
$concours = $this->model('concours');
$bannis = $this->model("bannis");
$liste_user = $utilisateurs->get_all();
				   $liste_concour = $concours->get_all();
$liste_banni = $bannis->get_all();
foreach($liste_concour as $valeur)
{
$valeur->con_statut = $concours->get_statut($valeur->con_statut)[0]->sta_nom;
}
foreach($liste_banni as $valeur)
{
$valeur->ban_pseudo = $utilisateurs->get($valeur->ban_utilisateur)[0]->uti_pseudo;
}
$liste[0] = $liste_user;
				   $liste[1] = $liste_concour;
$liste[2] = $liste_banni;
				   $this->view('admin','accueil','Administration',compact('liste'));
        }
    
        public function supprimer()
	{
    $this->acces("true");
$utilisateurs = $this->model('utilisateurs');
    $concours = $this->model('concours');
$participations = $this->model('participation');
$corrections = $this->model('correction');
if(isset($_GET['utilisateur']) and is_numeric($_GET['utilisateur']) and $_GET['action'] == 'supprimer' and !empty($utilisateurs->get($_GET['utilisateur'])) and $utilisateurs->get($_GET['utilisateur'])[0]->uti_id == $_GET['utilisateur'])
{
	$utilisateurs->delete($_GET['utilisateur']);
    $_SESSION['message'][] = "L'utilisateur ".$_GET['utilisateur']." à bien été supprimé";
    header("Location: index.php?page=admin&action=accueil");
    }
else if(isset($_GET['concour']) and $_GET['action'] == 'supprimer' and is_numeric($_GET['concour']) and !empty($concours->get($_GET['concour'])))
{
	$_SESSION['message'][] = "Le concour ".$concours->get($_GET['concour'])[0]->con_titre." à bien été supprimé";
    	$concours->delete($_GET['concour']);
    header("Location: index.php?page=admin&action=accueil");
        }
else if(isset($_GET['participation']) and $_GET['action'] == 'supprimer' and is_numeric($_GET['participation']) and !empty($participations->get($_GET['participation'])))
{
    $_SESSION['message'][] = "La participation de l'utilisateur ".$utilisateurs->get($participations->get($_GET['participation'])[0]->par_utilisateur)[0]->uti_pseudo." au concour ".$concours->get($participations->get($_GET['participation'])[0]->par_concour)[0]->con_titre." à bien été supprimé";
    $participations->delete($_GET['participation']);
        header("Location: index.php?page=admin&action=correction");
	}
else
{
$_SESSION['message'][] = "Une erreur est survenu lors de la suppression d'un concour ou d'un utilisateur";
	header('Location: index.php?page=admin&action=accueil');
}
    }

public function organiser()
    {
$this->acces("true");
if(isset($_POST['organiser']))
{
	if($_POST['con_date_fin'] <= $_POST['con_date_debut'])
	{
$_SESSION['message'][] = "La date de fin  du concour ne peut pas être égale ou inférieur à celle du début du concour";
header("Location: index.php?page=admin&action=organiser");
	exit;
	}
	else
	{
	$organiser = $this->model('concours');
	unset($_POST['organiser']);
$_POST['con_organisateur'] = $_SESSION['utilisateurs']['uti_pseudo'];
$_POST['con_statut'] = 1;
	$organiser->register($_POST);
$_SESSION['message'][] = "le concour à bien été organisé, il débutera le ".$_POST['con_date_debut'];
header("Location: index.php?page=admin&action=accueil");
exit;
	}
}
else
{
	$this->view('admin','organiser','Organiser un nouveau concour');
}
	   
}
}
