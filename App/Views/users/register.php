<h2>Inscription</h2>
<form method="post" action="">
<div class='form-group'>
		<label for='firstname'>Prénom</label>
		<input id='firstname' name='firstname' type='text' size='50' required class='form-control' />
	</div>
	<div class='form-group'>
		<label for='email'>Email</label>
		<input id='email' name='email' type='mail' size='50' class='form-control' />
	</div>
	<div class='form-group'>
		<label for='password'>Mot de passe</label>
		<input id='password' name='password' type='password' size='50' required class='form-control' />
	</div>
	<div class='form-group'>
		<label for='password_confirm'>Confirme ton mot de passe</label>
		<input id='password_confirm' name='password_confirm' type='password' size='50' required class='form-control' />
	</div>
	<input class="btn btn-success" type="submit" name="register" value="Je m'inscrit" />
</form>