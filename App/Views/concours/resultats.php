<h2>Résultat des différents concours</h2>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
	<tr>
            	    <th>Titre</th>
                        <th>Date limite</th>
			<th>Organisé par</th>
			<th>Statut</th>
			</tr>
    </thead>
    <tbody>
        <?php
	foreach($liste_concours as $liste_concours)
{
	echo "<tr>";
            echo "<td><a href='index.php?page=concours&action=resultat&concour=$liste_concours->con_id'>$liste_concours->con_titre</a></td>";
            echo "<td>du $liste_concours->con_date_debut au $liste_concours->con_date_fin</td>";
echo "<td>$liste_concours->con_organisateur</td>";
	    echo "<td>$liste_concours->con_statut</td>";
	    echo "</tr>";
}
?>
    </tbody>
</table>
