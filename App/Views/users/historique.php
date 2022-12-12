<h1>historique des participations encor actives</h1>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
	<tr>
            	    <th>Titre du concour</th>
		    <th>Date de participation</th>
                        <th>état</th>
			<th>Consulter</th>
			<th>Supprimer</th>
			</tr>
    </thead>
    <tbody>
        <?php
	foreach($historique as $valide)
{
	if($valide->par_validitee == "modifiable")
	{
	echo "<tr>";
                        echo "<td><h2>$valide->con_titre</h2></td>";
	    echo "<td>$valide->par_date</td>";
            echo "<td>$valide->par_validitee</td>";
echo "<td><a href='index.php?page=participation&action=consulter&participation=$valide->par_id'>Consulter</a></td>";
	    echo "<td><a href='index.php?page=participation&action=supprimer&participation=$valide->par_id'>Supprimer</a></td>";
	    echo "</tr>";
	}
}
?>
    </tbody>
</table>
<h1>historique des participations terminées</h1>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
	<tr>
            	    <th>Titre du concour</th>
                        <th>Date de participation</th>
<th>état</th>
<th>Consulter</th>
			</tr>
    </thead>
    <tbody>
        <?php
	foreach($historique as $invalide)
{
	if($invalide->par_validitee == "non modifiable")
	{
	echo "<tr>";
                        echo "<td><h2>$invalide->con_titre</h2></td>";
	    echo "<td>$invalide->par_date</td>";
            echo "<td>$invalide->par_validitee</td>";
	    echo "<td><a href='index.php?page=participation&action=consulter&participation=$valide->par_id'>Consulter</a></td>";
	    echo "</tr>";
	}
}
?>
    </tbody>
</table>
