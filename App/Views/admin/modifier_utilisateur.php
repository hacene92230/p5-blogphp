<h1>Modifier <?= $modifier[0]->uti_pseudo ?></h1>
<?php
foreach($modifier as $modification)
{
	?>
<form method="post" action="">
                                                						<input type="hidden" name="uti_date_inscription" id="uti_date_inscription" value="<?= $modification->uti_date_inscription ?>" />
	<h3>Informations obligatoires</h3>
<div class='form-group'>
		<label for='uti_profil'>Profil de l'utilisateur</label>
<select id="uti_profil" name="uti_profil">
<option value="1">Utilisateurs</option>
<option value="2">Membre de l'équipe</option>
<option value="3">Administrateur</option>
</select>
	</div>
	<div class='form-group'>
		<label for='uti_nom'>Nom</label>
		<input id='uti_nom' name='uti_nom' type='text' size='50' value="<?= $modification->uti_nom ?>" required class='form-control' />
	</div>
	<div class='form-group'>
		<label for='uti_pseudo'>Pseudo</label>
		<input id='uti_pseudo' name='uti_pseudo' type='text' size='50' value="<?= $modification->uti_pseudo ?>" required class='form-control' />
	</div>
	<div class='form-group'>
		<label for='uti_mdp'>Mot de passe</label>
		<input id='uti_mdp' name='uti_mdp' type='password' size='50' class='form-control' />
	</div>
	<h3>Informations facultatives</h3>
<div class='form-group'>
		<label for='uti_prenom'>Prénom</label>
		<input id='uti_prenom' name='uti_prenom' type='text' size='50' value="<?= $modification->uti_prenom ?>" class='form-control' />
	</div>
<div class='form-group'>
		<label for='uti_email'>Email</label>
		<input id='uti_email' name='uti_email' type='mail' size='50' value="<?= $modification->uti_email ?>" class='form-control' />
	</div>
<div class='form-group'>
<label for='uti_age'>Votre âge</label>
<input id='uti_age' name='uti_age' type='number' size='50' value="<?= $modification->uti_age ?>" class='form-control' /></div>
<div class='form-group'>
		<label for='uti_pays'>Pays</label>
		<input id='uti_pays' name='uti_pays' type='text' size='50' value="<?= $modification->uti_pays ?>"c lass='form-control' />
	</div>
		<input class="btn btn-success" type="submit" name="modifier" value="Enregistrer les modifications" />
            </form>
	    <?php
}
?>