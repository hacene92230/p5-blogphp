<?php
echo "<h2>consigne pour le concour: ".$voir[0]->con_titre."</h2>";
echo "<p>Fin du concour le: ".$voir[0]->con_date_fin;
echo "<p>Voici ci-dessous la consigne</p>";
echo $voir[0]->con_consigne;
?>
<h2>Commentaires</h2>
<?php
foreach($voir[1] as $cle => $commentaires)
{
echo "<p>$commentaires->com_utilisateur: $commentaires->com_date</p>
<p>$commentaires->com_contenu</p>";
}
?>
<form method="post" action="index.php?page=concours&action=commentaire">
	<input type="hidden" name="com_concour" value="<?= $_GET['concour'] ?>"/>
	<div class='form-group'>
		<label for='com_contenu'>Votre commentaire</label>
		<textarea name='com_contenu' id='com_contenu' placeholder="saisir votre commentaire" required class='form-control'></textarea></td>
	</div>
	<input type="submit" name="commentaire" value="Commenté">
</form>