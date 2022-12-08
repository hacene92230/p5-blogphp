<button class="btn btn-primary" type="button" data-target="#liste_concour" data-toggle="collapse" aria-expanded="false" aria-controls="liste_concour">Concours</button>
<table id="liste_concour" class="collapse table table-bordered table-hover">
    <thead class="well thead-dark">
	<tr>
            	    <th>Titre</th>
                        			<th>Date de début</th>
			<th>Date de fin</th>
	        	<th>Statut</th>
			<th>Organisé par</th>
			<th>Supprimé</th>
			<th>Modifier</th>
			</tr>
    </thead>
    <tbody>
        <?php
	foreach($liste[1] as $concours)
{
	echo "<tr>";
            echo "<td><h2>$concours->con_titre</h2></td>";
            echo "<td>$concours->con_date_debut</td>";
			echo "<td>$concours->con_date_fin</td>";
echo "<td>$concours->con_statut</td>";
echo "<td>$concours->con_organisateur</td>";
echo "<td><a href='index.php?page=admin&action=supprimer&concour=$concours->con_id'>Supprimer le concour</a></td>";
echo "<td><a href='index.php?page=admin&action=modifier&concour=$concours->con_id'>Modifier le concour</a></td>";
	    echo "</tr>";
}
?>
    </tbody>
</table>