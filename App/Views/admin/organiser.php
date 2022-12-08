<h2>Organiser un nouveau concour</h2>
<form method="post" action="">
<div class='form-group'>
	<label for='con_date_debut'>Date de début du concour</label>
	<input type='date' name='con_date_debut' id='con_date_debut' min="<?= date("Y-m-d") ?>" max="2100-12-30" value="<?= date("Y-m-d") ?>" required class='form-control'/>
	</div>
	<div class='form-group'>
	<label for='con_date_fin'>Date de fin du concour</label>
	<input type='date' name='con_date_fin' id='con_date_fin' min="<?= date("Y-m-d") ?>" max="2100-12-30" value="<?= date("Y-m-d") ?>" required class='form-control'/>
	</div>
	<div class='form-group'>
		<label for='con_titre'>Titre du concour</label>
		<input type='text' name='con_titre' id='con_titre' placeholder="saisir le titre du concour"  required class='form-control'/>
	</div>
	<div class='form-group'>
		<label for='con_consigne'>Consigne du concour</label>
		<textarea name='con_consigne' id='con_consigne' placeholder="Saisir la consigne du concour" required class"'form-control"></textarea>
	</div>
<div class='form-group'>
		<label for='con_neurone'>Nombre de neurones que vous souhaitez attribué au concour</label>
		<input type='number' name='con_neurone' id='con_neurone' placeholder="neurone attribuer à ce concour" min=1 required class='form-control'/>
	</div>
<input type="submit" name="organiser" value="J'organise le concour">
</form>