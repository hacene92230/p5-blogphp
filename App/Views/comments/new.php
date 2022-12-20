<form method="post" action="index.php?page=comments&action=new&post=<?= $_GET['post'] ?> ">
<div class='form-group'>
<label for='comment'>Votre commentaires</label>
	<textarea id="content" name="content" placeholder="saisir votre commentaire" required class='form-control'></textarea>
	</div>
	<input class="btn btn-success" type="submit" name="new" value="Commenté" />
</form>