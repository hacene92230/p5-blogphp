<h2>S'authentifier</h2>
<form method="post" action="">
	<div class='form-group'>
		<label for='email'>Votre Email</label>
		<input type='text' name='email' id='email' placeholder="saisir votre email"  required class='form-control'/>
	</div>
	<div class='form-group'>
		<label for='password'>Votre mot de passe</label>
		<input type='password' name='password' id='password' placeholder="saisir votre mot de passe"  required class='form-control'/>
	</div>
	<input type="submit" name="login" value="Je me connecte">
<div>
                <input type="checkbox" id="rememberme" name="rememberme" value="1" <?php if(isset($_COOKIE['remembermeu'])) {echo 'checked="checked"';} else { echo ''; }?> >
                <label for="rememberme">Se souvenir de moi</label>
            </div>
</form>