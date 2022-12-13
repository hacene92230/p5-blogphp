<h2>Supprimer un article</h2>
<form method="post" action="">
<label for="delete">Quel article supprimer</label>
<select name="delete">
    <?php
    foreach ($tabpost as $cle) {
        echo '<option value="' . $cle->id . '">' . $cle->title . '</option>';
    }
    ?>
</select>
            <input type="submit" value="Supprimer"/>
</form>