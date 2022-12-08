<h2>Rédiger un message</h2>
<form method="post" action="">
	<div class='form-group'>
		<label for='mes_destinataire'>Destinataire du message</label>
		<input type='text' name='mes_destinataire' id='mes_destinataire' required class='form-control'/>
	</div>
	<div class='form-group'>
		<label for='mes_objet'>Objet de votre message</label>
		<input type='text' name='mes_objet' id='mes_objet' required class='form-control'/>
	</div>
<div class='form-group'>
		<label for='mes_contenu'>Le contenu de votre message</label>
	<textarea id="mes_contenu" name="mes_contenu" placeholder="saisir le texte du message que vous souhaitez envoyer" required class='form-control'></textarea>
	</div>
	<input type="submit" name="rediger" value="Envoyer le message">
</form>