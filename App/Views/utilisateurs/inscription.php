<h2>Inscription</h2>
<form method="post" action="">
	<input type="hidden" name="uti_date_inscription" id="uti_date_inscription" value="<?= date("Y-m-d"); ?>" />
	<h2>Informations obligatoires</h2>
	<div class='form-group'>
		<label for='uti_nom'>Nom</label>
		<input id='uti_nom' name='uti_nom' type='text' size='50' required class='form-control' />
	</div>
	<div class='form-group'>
		<label for='uti_pseudo'>Pseudo</label>
		<input id='uti_pseudo' name='uti_pseudo' type='text' size='50' required class='form-control' />
	</div>
	<div class='form-group'>
		<label for='uti_mdp'>Mot de passe</label>
		<input id='uti_mdp' name='uti_mdp' type='password' size='50' required class='form-control' />
	</div>
	<div class='form-group'>
		<label for='uti_mdp_confirm'>Confirme ton mot de passe</label>
		<input id='uti_mdp_confirm' name='uti_mdp_confirm' type='password' size='50' required class='form-control' />
	</div>
<h2>Informations facultatives</h2>
<div class='form-group'>
		<label for='uti_prenom'>Prénom</label>
		<input id='uti_prenom' name='uti_prenom' type='text' size='50' class='form-control' />
	</div>
<div class='form-group'>
		<label for='uti_email'>Email</label>
		<input id='uti_email' name='uti_email' type='mail' size='50' class='form-control' />
	</div>
<div class='form-group'>
<label for='uti_age'>Votre âge</label>
<input id='uti_age' name='uti_age' type='number' min="10" value="10" size='50' class='form-control' /></div>
<div class='form-group'>
		<label for='uti_pays'>Pays</label>
		<input id='uti_pays' name='uti_pays' type='text' size='50' class='form-control' />
	</div>
	<input class="btn btn-success" type="submit" name="uti_inscription" value="Je m'inscrit" />
</form>