<h2>Rédiger un nouvel article</h2>
<form method="post" action="">
<div class='form-group'>
		<label for='title'>Titre de votre article</label>
		<input id='title' name='title' type='text' size='50' required class='form-control' />
	</div>
	<div class='form-group'>
		<label for='content'>Contenu de votre article</label>
	<textarea id="content" name="content" placeholder="saisir  le contenu de l'article que vous rédigez" required class='form-control'></textarea>
	</div>
	<input class="btn btn-success" type="submit" name="new" value="Publier mon article" />
</form>