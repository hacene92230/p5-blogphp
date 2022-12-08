<div>
<button class="btn btn-primary" type="button" data-target="#MonCollapse" data-toggle="collapse" aria-expanded="false" aria-controls="MonCollapse">Utilisateurs</button>
</div>
<table id="MonCollapse" class="collapse table table-bordered table-hover">
    <thead class="well thead-dark">
	<tr>
            	    <th>Pseudo</th>
                        <th>Date d'inscription</th>
			<th>Supprimé</th>
	        	<th>Bannir</th>
			<th>Modifier</th>
			</tr>
    </thead>
    <tbody>
        <?php
	foreach($liste[0] as $utilisateurs)
{
	echo "<tr>";
            echo "<td><h2>$utilisateurs->uti_pseudo</h2></td>";
            echo "<td>$utilisateurs->uti_date_inscription</td>";
echo "<td><a href='index.php?page=admin&action=supprimer&utilisateur=$utilisateurs->uti_id'>Supprimer le compte</a></td>";
echo "<td><a href='index.php?page=admin&action=bannir&utilisateur=$utilisateurs->uti_id'>Bannir le compte</a></td>";
echo "<td><a href='index.php?page=admin&action=modifier&utilisateur=$utilisateurs->uti_id'>Modifier le compte</a></td>";
	    echo "</tr>";
}
?>
    </tbody>
</table>