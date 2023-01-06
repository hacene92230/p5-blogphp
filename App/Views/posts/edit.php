<?php
if (isset($_POST['viewAll'])) {
?>
    <form method="post" action="">
        <input id="id" name="id" type="hidden" value="<?= $look[0]['id'] ?>" />
        <div class='form-group'>
            <label for='title'>Titre de l'article</label>
            <input id='title' name='title' type='text' size='50' value="<?= $look[0]['title'] ?>" class='form-control' />
        </div>
        <div class='form-group'>
            <label for='content'>Contenu de votre article</label>
            <textarea id="content" name="content" placeholder="saisir  le contenu de l'article que vous rédigez" required class='form-control'><?= $look[0]['content'] ?></textarea>
        </div>
        <input class="btn btn-success" type="submit" name="edit" value="Modifier cet article" />
    </form>
<?php
} else if (!isset($_POST['viewAll'])) {
?>
    <h2>Choisir un article à éditer</h2>
    <form method="post" action="    ">
        <label for="delete">Quel article éditer</label>
        <select name="viewAll">
            <?php
            foreach ($viewAll as $cle) {
                echo '<option value="' . $cle->id . '">' . $cle->title . '</option>';
            }
            ?>
        </select>
                    <input type="submit" value="éditer" />
    </form>
<?php
}
?>