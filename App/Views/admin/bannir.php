<h2>Bannir <?= $bannir[0]->uti_pseudo ?></h2>
<form method="post" action="">
	<div class='form-group'>
	<label for='ban_date'>Date de fin du bannissement</label>
	<input type='date' name='ban_date' id='ban_date' min="<?= date("Y-m-d") ?>" max="2100-12-30" value="<?= date("Y-m-d") ?>" required class='form-control'/>
</div>
	<div class='form-group'>
		<label for='ban_raison'>Raison du bannissement</label>
		<textarea name='ban_raison' id='ban_raison' placeholder="Saisir la raison du bannissement" required class"'form-control"></textarea>
	</div>
<input type="submit" name="bannir" value="Bannir cet utilisateur">
</form>