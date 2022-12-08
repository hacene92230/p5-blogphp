<h1>Modifier <?= $modifier[0]->con_titre ?></h1>
<?php
foreach($modifier as $modification)
{
	?>
<form method="post" action="">
<div class='form-group'>
		<label for='con_statut'>Statut du concours</label>
<select id="con_statut" name="con_statut">
<option value="1">En cours</option>
<option value="2">Fermé</option>
<option value="3">En attente de correction</option>
<option value="4">Corrigé</option>
</select>
	</div>
<div class='form-group'>
		<label for='con_neurone'>neurones</label>
<input id='con_neurone' name='con_neurone' placeholder="le nombre de neurone que vous souhaitez attribuer au concour" type='number' size='4' value="<?= $modification->con_neurone ?>" required class='form-control' />
	</div>
<div class='form-group'>
	<label for='con_date_debut'>Date de début du concour</label>
	<input type='date' name='con_date_debut' id='con_date_debut' value="<?= $modification->con_date_debut ?>" required class='form-control'/>
	</div>
	<div class='form-group'>
	<label for='con_date_fin'>Date de fin du concour</label>
	<input type='date' name='con_date_fin' id='con_date_fin' value="<?= $modification->con_date_fin ?>" required class='form-control'/>
	</div>
<div class='form-group'>
		<label for='con_titre'>Titre</label>
<input id='con_titre' name='con_titre' placeholder="le titre du concour" type='text' size='50' value="<?= $modification->con_titre ?>" required class='form-control' />
	</div>
	<div class='form-group'>
		<label for='con_consigne'>Consigne</label>
		<textarea id='con_consigne' name='con_consigne' placeholder="la consigne du concour" required class="form-control"><?= $modification->con_consigne ?></textarea>
	</div>
		<input class="btn btn-success" type="submit" name="modifier" value="Enregistrer les modifications" />
            </form>
	    <?php
}
?>