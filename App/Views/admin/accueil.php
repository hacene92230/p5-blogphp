<h1>Bienvenu sur l'administration de CDS</h1>
<h2>Gestion des concours</h2>
<p><a href="index.php?page=admin&action=organiser">Organiser un concour</a></p>
<p><a href="index.php?page=admin&action=correction">Corriger un concour</a></p>
<?php
include_once("liste_concours.php");
echo '<h2>Gestion des utilisateurs</h2>';
include_once("liste_bannis.php");
include_once("liste_utilisateurs.php");
?>