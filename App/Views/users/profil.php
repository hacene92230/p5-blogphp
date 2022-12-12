<h2>Mon profil</h2>
            	    <form method="post" action="">
					<input class="btn btn-success" type="submit" name="supprimer" value="Supprimer mon compte"/>
					<div class='form-group'>
	<label for='firstname'>Prénom</label>
		<input id='firstname' name='firstname' type='text' size='50' value="<?= $firstname ?>" class='form-control' />
	</div>
<div class='form-group'>
		<label for='email'>Email</label>
		<input id='email' name='email' type='mail' size='50' value="<?= $email ?>" class='form-control' />
	</div>
	<div class='form-group'>
		<label for='password'>Mot de passe</label>
		<input id='password' name='password' type='password' size='50' class='form-control' />
	</div>
	<input class="btn btn-success" type="submit" name="edit" value="Modifier" />
            </form>