<h2>Consulté une participation</h2>
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