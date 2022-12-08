<h2>S'authentifier</h2>
<form method="post" action="">
	<div class='form-group'>
		<label for='uti_pseudo'>Votre Pseudo</label>
		<input type='text' name='uti_pseudo' id='uti_pseudo' placeholder="saisir votre pseudo"  required class='form-control'/>
	</div>
	<div class='form-group'>
		<label for='uti_mdp'>Votre mot de passe</label>
		<input type='password' name='uti_mdp' id='uti_mdp' placeholder="saisir votre mot de passe"  required class='form-control'/>
	</div>
	<input type="submit" name="authentification" value="Je me connecte">
<div>
                <input type="checkbox" id="rememberme" name="rememberme" value="1" <?php if(isset($_COOKIE['remembermeu'])) {echo 'checked="checked"';} else { echo ''; }?> >
                <label for="rememberme">Se souvenir de moi</label>
            </div>
</form>