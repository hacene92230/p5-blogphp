<h2>Consulter un message</h2>
<?php
foreach($display as $display)
{
	echo "<p>Message reçu le $display->mes_date</p>";
echo "<p>$display->mes_contenu</p>";
}
?>
<h2>Répondre à ce message</h2>
<form method="post" action="">
		<input type='hidden' name='mes_destinataire' id='mes_destinataire' value="<?= $display->mes_destinataire ?>" required>
<div class='form-group'>
		<label for='mes_objet'>Objet de votre message</label>
		<input type='text' name='mes_objet' id='mes_objet' value="(Réponse à:) <?= $display->mes_objet ?>" required class='form-control'/>
	</div>
<div class='form-group'>
		<label for='mes_contenu'>Le contenu de votre message</label>
	<textarea id="mes_contenu" name="mes_contenu" placeholder="saisir le texte du message que vous souhaitez envoyer" required class='form-control'></textarea>
	</div>
	<input type="submit" name="repondre" value="Je répond">
</form>