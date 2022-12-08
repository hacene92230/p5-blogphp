<h2>listes des concours</h2>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
	<tr>
            	    <th>Pseudo du participant</th>
                        <th>Date de la participation</th>
			<th>Consulté</th>
			</tr>
    </thead>
    <tbody>
        <?php
	foreach($liste_participation as $liste)
{
	echo "<tr>";
                        echo "<td>$liste->par_utilisateur</td>";
	    echo "<td>$liste->par_date</td>";
            echo "<td><a href='index.php?page=participation&action=consulter&participation=$liste->par_id'>Consulté</a></td>";
	    echo "</tr>";
}
?>
    </tbody>
</table>
