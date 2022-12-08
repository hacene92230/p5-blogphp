<h2>Concours actuellement disponible</h2>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
	<tr>
            	    <th>Titre</th>
                        <th>Récompense en neurone</th>
			<th>Organisé par</th>
			<th>Date de début</th>
	        	<th>Date de fin</th>
			<th>Statut</th>
			<th>Participation</th>
			</tr>
    </thead>
    <tbody>
        <?php
	foreach($accueil as $accueil)
{
	echo "<tr>";
            echo "<td><h2><a href='index.php?page=concours&action=voir&concour=$accueil->con_id'>$accueil->con_titre</a></h2></td>";
	    echo "<td>$accueil->con_neurone</td>";
	    echo "<td>$accueil->con_organisateur $accueil->autorisation_participation</td>";
	    echo "<td>$accueil->con_date_debut</td>";
            echo "<td>$accueil->con_date_fin</td>";
	    echo "<td>$accueil->con_statut</td>";
	    if($accueil->con_statut != "en cours")
	    {
		    echo "<td>Ce concour n'est plus ouvert ça participation est donc fermée.</td>";
	    }
	    else if(!isset($_SESSION['utilisateurs']))
	    {
echo "<td><a href='index.php?page=utilisateurs&action=authentification'>Je me connecte pour parciciper</a></td>";
}
else if(isset($accueil->autorisation) and $accueil->autorisation == "non")
{
echo "<td>Vous avez déjà participé à ce concour</td>";
}
else
{
	echo "<td><a href='index.php?page=participation&action=participer&concour=$accueil->con_id'>Je souhaite participer</a></td>";
}
echo "</tr>";
}
?>
    </tbody>
</table>