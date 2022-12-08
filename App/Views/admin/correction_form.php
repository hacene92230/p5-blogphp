<h1>Consulté une participation</h1>
<?php
echo "<p>à participé le: ".$consulter_participation[0]->par_date."</p>";
echo "<p>Cette participation provient de l'utilisateur ".$consulter_participation[0]->par_utilisateur."</p>";
echo "<p>Commentaire de l'utilisateur: </p>";
echo "<p>".$consulter_participation[0]->par_commentaire."</p>";
if(empty($consulter_participation[0]->par_fichier))
{
echo "<p>La participation est fournie sous un format texte.</p>";
echo "<p>La voici:</p>";
echo "<p>".$consulter_participation[0]->par_texte."</p>";
}
else
{	
echo "<p>La participation est fournie via un fichier déposer par l'utilisateur</p>";
	echo "<p>La voici:</p>";
foreach($consulter_participation[1] as $lecture)
{
echo $lecture;
}
}
?>	
<h2>T'en pense quoi?</h2>
<form action="" method="post">
<div class="form-check">
<label class="form-check-label" for='podium1'>Premier dans le podium</label>
<input type='radio' class="form-check-input" id='podium1' name='cor_podium' value='1'>
	    <label class="form-check-label" for='podium2'>Second dans le podium</label>
<input type='radio' class="form-check-input" id='podium2' name='cor_podium' value='2'>
            <label class="form-check-label" for='podium3'>Troisième dans le podium</label>
<input type='radio' class="form-check-input" id='podium3' name='cor_podium' value='3'>
</div>
<div class='form-group'>
		<label for='cor_neurone'>Le nombre de neurone que tu souhaite lui attribuer</label>
		<input type='number' name='cor_neurone' id='cor_neurone' value=1 min="1" max="<?= $consulter_participation[0]->con_neurone ?>" required class='form-control'/>
	</div>
<div class='form-group'>

<label for='cor_critique'>Ta critique concernant cette participation</label>
		<textarea name='cor_critique' id='cor_critique' class='form-control'></textarea>
	</div
</div>
<input type="submit" name="corriger" value="corriger">
</form>