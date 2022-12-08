<h2>Archives des concours</h2>
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
	foreach($archive as $archive)
{
	echo "<tr>";
            echo "<td><h2><a href='index.php?page=concours&action=voir&concour=$archive->con_id'>$archive->con_titre</a></h2></td>";
            echo "<td>$archive->con_organisateur</td>";
	    echo "<td>$archive->con_date_debut</td>";
            echo "<td>$archive->con_date_fin</td>";
	    echo "<td>$archive->con_statut</td>";
	    echo "</tr>";
}
?>
    </tbody>
</table>
