<h2>Mon profil</h2>
            <a href="index.php?page=utilisateurs&action=profil&souhait=supprimer">Supprimer mon compte</a>
	    <form method="post" action="">
                                                						<input type="hidden" name="uti_date_inscription" id="uti_date_inscription" value="<?= $uti_date_inscription ?>" />
	<h3>Informations obligatoires</h3>
	<div class='form-group'>
		<label for='uti_nom'>Nom</label>
		<input id='uti_nom' name='uti_nom' type='text' size='50' value="<?= $uti_nom ?>" required class='form-control' />
	</div>
	<div class='form-group'>
		<label for='uti_pseudo'>Pseudo</label>
		<input id='uti_pseudo' name='uti_pseudo' type='text' size='50' value="<?= $uti_pseudo ?>" required class='form-control' />
	</div>
	<div class='form-group'>
		<label for='uti_mdp'>Mot de passe</label>
		<input id='uti_mdp' name='uti_mdp' type='password' size='50' class='form-control' />
	</div>
	<h3>Informations facultatives</h3>
<div class='form-group'>
		<label for='uti_prenom'>Prénom</label>
		<input id='uti_prenom' name='uti_prenom' type='text' size='50' value="<?= $uti_prenom ?>" class='form-control' />
	</div>
<div class='form-group'>
		<label for='uti_email'>Email</label>
		<input id='uti_email' name='uti_email' type='mail' size='50' value="<?= $uti_email ?>" class='form-control' />
	</div>
<div class='form-group'>
<label for='uti_age'>Votre âge</label>
<input id='uti_age' name='uti_age' type='number' size='50' value="<?= $uti_age ?>" class='form-control' /></div>
<div class='form-group'>
		<label for='uti_pays'>Pays</label>
		<input id='uti_pays' name='uti_pays' type='text' size='50' value="<?= $uti_pays ?>"c lass='form-control' />
	</div>
		<input class="btn btn-success" type="submit" name="edit" value="Enregistrer les modifications" />
            </form>