<h2>Nous contacter</h2>
<form method="post" action="">
<div class='form-group'>
		<label for='con_prenom'>Votre prénom</label>
		<input type='text' name='con_prenom' id='con_prenom' placeholder="votre prénom"  required class='form-control'/>
	</div>
<div class='form-group'>
		<label for='con_email'>Votre adresse email</label>
		<input type='email' name='con_email' id='con_email' placeholder="votre adresse email"  required class='form-control'/>
	</div>
	<div class='form-group'>
		<label for='con_objet'>L'objet de votre message</label>
		<input type='text' name='con_objet' id='con_objet' placeholder="saisir l'objet de votre message"  required class='form-control'/>
	</div>
	<div class='form-group'>
		<label for='con_contenu'>Votre message à nous faire parvenir</label>
		<textarea name='con_contenu' id='con_contenu' placeholder="ici le contenu de votre message" required class='form-control'></textarea>
	</div>
	<input type="submit" name="contact" value="Envoyé mon message">
</form>