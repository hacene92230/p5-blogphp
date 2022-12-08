<h2>Messagerie</h2>
<form method="post" action="">
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
	<tr>
            <th>émetteur</th>
	    <th>Objet</th>
                        <th>Date</th>
	        	</tr>
    </thead>
    <tbody>
        <?php
	foreach($msg as $msg)
{
	echo "<tr>";
            echo "<td><input type='checkbox' id='$msg->mes_id' name='$msg->mes_id' value='$msg->uti_pseudo'>";
            echo "<label for='$msg->mes_id'>$msg->uti_pseudo</label></td>";
	    echo "<td><a href='index.php?page=messagerie&action=voir&message=$msg->mes_id'>$msg->mes_objet</a></td>";
            echo "<td>$msg->mes_date</td>";
            echo "</tr>";
}
?>
    </tbody>
</table>
<?php
if(!empty($msg)) { 
?>
<p><input type='checkbox' id='delete_all' name='delete_all' value='supprimer'>
            <label for='delete_all'>Supprimer tout les messages</label></p>
	    
<p><button type="submit" formaction="index.php?page=messagerie&action=supprimer">Supprimer</button></p>
<?php } ?>
<p><button type="submit" formaction="index.php?page=messagerie&action=rediger">Rédiger un message</button></p>
</form>