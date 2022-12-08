<h1>Participation à un concour</h1>
<p>La participation à un concour peut s'effectuer de deux manières différentes que voici:</p>
<ul>
<li>Soit vous  disposez d'un fichier au format: text, rtf ou docx que vous déposez via le bouton "déposer ma participation à travers un fichier"</li>
<li>soit vous pouvez dirrectement remplir le formulaire adéquat, en n'omettant pas de remplir tout les champs comme préciser.</li>
</ul>
<p>Une fois l'une des deux étapes ci-dessus choisis, vous pouvez cliquer sur je participe au concour</p>
<p>Attention, chaque participation est unique et elle doit  provenir de votre propre production</p>
<p>Vous pouvez modifier une participation en vous rendant dans votre pseudo puis dans mes participations</p>
<h2>Participation via le dépôt de fichier</h2>
<form method="post" enctype="multipart/form-data" action="">
<div class='form-group'>
		     <input type="hidden" name="MAX_FILE_SIZE" value="100000">
		<label for='par_fichier'>Votre fichier à déposer</label>
<input type="file" name="par_fichier" id="par_fichier">
</div>
<div class='form-group'>
<label for='par_commentaire'>Saisir un commentaire si vous le souhaitez affin de précisé des informations concernant le fichier.</label>
		<textarea name="par_commentaire" placeholder="Votre commentaire" class='form-control'></textarea>
</div>
<h2>Participation via le formulaire à ramplir</h2>
<div class='form-group'>
<label for='par_texte'>Votre participation dirrectement collé ci-dessous</label>
		<textarea name="par_texte" placeholder="ici votre texte" class='form-control'></textarea>
</div>
<input type="submit" name="participer" value="Je soumets ma participation">
</form>