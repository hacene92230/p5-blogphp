<h2>Corriger un concour</h2>
<table class="table table-bordered table-hover">
    <thead class="well thead-dark">
            	    <tr>
		    <th>Titre du concour</th>
<th>Nombre de participation à ce concour</th>
<th>Date de participation</th>
			<th>Pseudo du participant</th>
			<th>Corrigé</th>
			<th>Supprimer</th>
			</tr>
    </thead>
    <tbody>
        <?php
$last = null;
	foreach($liste_participation as $participation)
{
		echo "<tr>";
		if ($participation->par_concour !== $last)
	{
	    $last = $participation->par_concour;
	    echo "<td><h2>$participation->par_concour</h2></td>";
	echo "<td>$participation->par_nb</td>";
	}
else
{
	echo "<td></td>";
	echo "<td></td>";
}
	echo "<td>$participation->par_date</td>";
echo "<td>$participation->par_utilisateur</td>";
echo "<td><a href='index.php?page=admin&action=correction&participation=$participation->par_id'>Corriger la participation</a></td>";
echo "<td><a href='index.php?page=admin&action=supprimer&participation=$participation->par_id'>Suppprimer la participation</a></td>";
	    echo "</tr>";
}
?>
    </tbody>
</table>