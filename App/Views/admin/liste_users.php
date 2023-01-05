<div>
	<button class="btn btn-primary" type="button" data-target="#MonCollapse" data-toggle="collapse" aria-expanded="false" aria-controls="MonCollapse">Utilisateurs</button>
</div>
<table id="MonCollapse" class="collapse table table-bordered table-hover">
	<thead class="well thead-dark">
		<tr>
			<th>Prénom</th>
			<th>Email</th>
			<th>Supprimé</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($listUsers as $utilisateurs) {
			echo "<tr>";
			echo "<td><h2>$utilisateurs->firstname</h2></td>";
			echo "<td>$utilisateurs->email</td>";
			echo "<td><a href='index.php?page=admin&action=userRemove&user=$utilisateurs->id'>Supprimer le compte</a></td>";
			echo "</tr>";
		}
		?>
	</tbody>
</table>