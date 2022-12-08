<?php
namespace App\Controllers;
  use System\Coeur\Controllers\Controller;
use Faker;
    class Generate extends Controller
    {
        public function accueil()
{
$utilisateurs = $this-> model('utilisateurs');
$utilisateurs->truncate("utilisateurs");
$commentaires = $this-> model('commentaires');
$commentaires->truncate("commentaires");
$concours = $this->model("concours");
$concours->truncate("concours");
$participation = $this->model('participation');
$participation->truncate("participation");
$messagerie = $this-> model('messagerie');
$messagerie->truncate("messagerie");
$faker = Faker\Factory::create('fr_FR');
echo "<h2>Génération des utilisateurs</h2>";
for($tbutilisateurs = 1; $tbutilisateurs <= 300; $tbutilisateurs++)
{
if($tbutilisateurs == 1)
{
	$_POST['uti_pseudo'] = "admin";
	$_POST['uti_mdp'] = password_hash("admin", PASSWORD_DEFAULT);
	$_POST['uti_nom'] = "sahraoui";
	$_POST['uti_prenom'] = "hacene";
	$_POST['uti_date_inscription'] = date("Y-m-d");
$_POST['uti_profil'] = 3;
$utilisateurs->register($_POST);
}
$_POST['uti_pseudo'] = $faker->userName();
$_POST['uti_mdp'] = $faker->password();
$_POST['uti_profil'] = rand(1,2);
$_POST['uti_date_inscription'] = $faker->date();
$_POST['uti_nom'] = 	$faker->lastName;
$_POST['uti_prenom'] = 	$faker->name;
$_POST['uti_email'] = $faker->email;
$_POST['uti_age'] = rand(18,70);
$_POST['uti_pays'] = $faker->country;
$utilisateurs->register($_POST);
}
echo "<h2>Génération des commentaires</h2>";
for($tbcommentaires = 1; $tbcommentaires <= 1000; $tbcommentaires++)
{
$_POST['com_date'] = $faker->date();
$_POST['com_contenu'] = $faker->sentence();
$_POST['com_utilisateur'] = rand(1,300);
$_POST['com_concour'] = rand(1,50);
$commentaires->register($_POST);
}
echo "<h2>Génération des concours</h2>";
for($tbconcours = 1; $tbconcours <= 260; $tbconcours++)
{
foreach($faker->words(5) as $valeur)
{
$_POST['con_titre'] = $valeur;
}
$_POST['con_neurone'] = rand(30,150);
foreach($faker->paragraphs(2) as $valeur)
{
$_POST['con_consigne'] = $valeur;
}
$_POST['con_date_debut'] = rand(1991,2004)."-0".rand(1,5)."-0".rand(1,9);
$_POST['con_date_fin'] = rand(2005,2020)."-0".rand(1,6)."-".rand(1,2);
$_POST['con_organisateur'] = rand(1,7);
$_POST['con_statut'] = rand(1,4);
$concours->register($_POST);
}
echo "<h2>Génération des participations</h2>";
for($tbparticipations = 1; $tbparticipations <= 2000; $tbparticipations ++)
{
$_POST['par_concour'] = rand(1,260);
$_POST['par_utilisateur'] = rand(1,100);
$_POST['par_date'] = $faker->date();
$_POST['par_commentaire'] = $faker->sentence();
$_POST['par_validitee'] = rand(0,1);
foreach($faker->paragraphs(11) as $valeur)
{
$_POST['par_texte'] = $valeur;
}
$participation->register($_POST);
}
echo "<h2>Génération des messages</h2>";
for($tbmessages = 1; $tbmessages <= 1000; $tbmessages ++)
{
$_POST['mes_date'] = $faker->date();
$_POST['mes_objet'] = $faker->sentence();
foreach($faker->paragraphs(4) as $valeur)
{
$_POST['mes_contenu'] = $valeur;
}
$_POST['mes_destinataire'] = rand(1,150);
$_POST['mes_emetteur'] = rand(151,300);
$messagerie->register($_POST);
}
}
    }
