<div>
<button class="btn btn-primary" type="button" data-target="#bannir" data-toggle="collapse" aria-expanded="false" aria-controls="bannir">Liste des bannis</button>
</div>
<table id="bannir" class="collapse table table-bordered table-hover">
    <thead class="well thead-dark">
	<tr>
            	    <th>Pseudo</th>
                        <th>Date de fin du bannissement</th>
			<th>Raison</th>
	        	<th>Débannir</th>
</tr>
    </thead>
    <tbody>
        <?php
	foreach($liste[2] as $bannis)
{
	echo "<tr>";
            echo "<td><h2>$bannis->ban_pseudo</h2></td>";
            echo "<td>$bannis->ban_date</td>";
echo "<td>$bannis->ban_raison</td>";
echo "<td><a href='index.php?page=admin&action=debannir&ban=$bannis->ban_id'>Débannir le compte</a></td>";
	    echo "</tr>";
}
?>
    </tbody>
</table>