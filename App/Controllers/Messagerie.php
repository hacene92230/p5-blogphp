<?php
namespace App\Controllers;
    use System\Coeur\Controllers\Controller;
    class messagerie extends Controller
    {
        public function accueil()
        {
$this->acces();
$message = $this->model();
extract($_SESSION['utilisateurs']);
$msg = $message->find_message($uti_id);
$this->view('messagerie','accueil','messagerie',compact('msg'));
}

public function supprimer()
{
$this->acces();
$message  = $this->model();
if(!empty($_POST))
{
foreach($_POST as $cle => $valeur)
{
$message->delete($cle);
}
$_SESSION['message'][] = "les messages sélectionnés on bien été supprimer";
header("Location: index.php?page=messagerie&action=accueil");
exit;
}
else
{
	header("Location: index.php?page=messagerie&action=accueil");
}
}

public function rediger()
{
	$this->acces();
	
	if(isset($_POST['rediger']))
	{
		$message = $this->model();
$destinataire = $message->find_destinataire($_POST['mes_destinataire']);
if(!empty($destinataire))
	{
	unset($_POST['rediger']);
$_POST['mes_emetteur'] = $_SESSION['utilisateurs']['uti_id'];
	$_POST['mes_destinataire'] = $destinataire[0]['uti_id'];
	$_POST['mes_date'] = date("d-m-Y");
	$message->register($_POST);
	$_SESSION['message'][] = "votre message à bien été envoyé!";
	header("Location: index.php?page=messagerie&action=accueil");
	exit;
	}
	else
	{
		$_SESSION['message'][] = "le destinataire que vous avez saisi n'existe pas";
	}
	}
	$this->view('messagerie','rediger','Rédiger un nouveau message');
}

public function voir()
{
$this->acces();

$voir = $this->model();
	$display = $voir->get($_GET['message']);
	if(isset($_POST['repondre']))
{
$destinataire = $voir->find_destinataire($_POST['mes_destinataire']);
if(!empty($destinataire))
	{
	unset($_POST['rediger']);
$_POST['mes_emetteur'] = $_SESSION['utilisateurs']['uti_id'];
	$_POST['mes_destinataire'] = $destinataire[0]['uti_id'];
	$_POST['mes_date'] = date("d-m-Y");
	$voir->register($_POST);
	$_SESSION['message'][] = "votre message à bien été envoyé!";
	header("Location: index.php?page=messagerie&action=accueil");
	exit;
	}
}
	if(isset($display[0]->mes_destinataire) and isset($_GET['message']) and $_GET['message'] != "" and $_SESSION['utilisateurs']['uti_id'] == $display[0]->mes_destinataire)
	{
$this->view('messagerie','voir','consulter un message',compact('display'));
	}
	else
	{
header("Location: index.php?page=messagerie&action=accueil");
	}
}



}
