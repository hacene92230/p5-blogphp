<h2>Les concours en attente de correction</h2>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
	<tr>
            	    <th>Titre</th>
                        <th>Organisé par</th>
			<th>Date de début</th>
	        	<th>Date de fin</th>
			<th>Statut</th>
			</tr>
    </thead>
    <tbody>
        <?php
	foreach($liste_attente as $attente)
{
	echo "<tr>";
            echo "<td><h2><a href='index.php?page=concours&action=voir&concour=$attente->con_id'>$attente->con_titre</a></h2></td>";
            echo "<td>$attente->con_organisateur</td>";
	    echo "<td>$attente->con_date_debut</td>";
            echo "<td>$attente->con_date_fin</td>";
	    echo "<td>$attente->con_statut</td>";
	    echo "</tr>";
}
?>
    </tbody>
</table>
