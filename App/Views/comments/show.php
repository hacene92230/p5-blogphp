<h2>Commentaires déjà approuver.</h2>
<table class="table-bordered table-hover">
    <thead class="well thead-dark">
        <tr>
            <th>Prénom</th>
            <th>Contenu du commentaire</th>
            <th>Statut</th>
            <th>Refuser</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($comments as $show) {
            if ($show->approval == 1) {
                $show->approval = "déjà approuvé";
                echo "<tr>";
                echo "<td>" . $show->user_comment[0]['firstname'] . "</td>";
                echo "<td>" . $show->content . "</td>";
                echo "<td>" . $show->approval . "</td>";
                echo "<td><a href='index.php?page=admin&action=comment_no_validate&comment=" . $show->id . "'>Refuser le commentaires</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<h2>Commentaires en attente d'approbation</h2>
<table class="table-bordered table-hover">
    <thead class="well thead-dark">
        <tr>
            <th>Prénom</th>
            <th>Contenu du commentaire</th>
            <th>Statut</th>
            <th>Valider</th>
            <th>Refuser</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($comments as $show) {
            if ($show->approval == 0) {
                $show->approval = "En attente d'approbation.";
                echo "<tr>";
                echo "<td>" . $show->id . "</td>";
                echo "<td>" . $show->content . "</td>";
                echo "<td>" . $show->approval . "</td>";
                echo "<td><a href='index.php?page=admin&action=comment_validate&comment=" . $show->id . "'>Valider le commentaire</a></td>";
                echo "<td><a href='index.php?page=admin&action=comment_no_validate&comment=" . $show->id . "'>Refuser le commentaires</a></td>";
                echo "</tr>";
            }
        } ?>
    </tbody>
</table>
<h2>Commentaires refuser</h2>
<table class="table-bordered table-hover">
    <thead class="well thead-dark">
        <tr>
            <th>Prénom</th>
            <th>Contenu du commentaire</th>
            <th>Statut</th>
            <th>Valider</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($comments as $show) {
            if ($show->approval == 2) {
                $show->approval = "Refuser.";
                echo "<tr>";
                echo "<td>" . $show->id . "</td>";
                echo "<td>" . $show->content . "</td>";
                echo "<td>" . $show->approval . "</td>";
                echo "<td><a href='index.php?page=admin&action=comment_validate&comment=" . $show->id . "'>Valider le commentaire</a></td>";
                echo "<td><a href='index.php?page=admin&action=comment_delete&comment=" . $show->id . "'>Supprimer le commentaires</a></td>";
                echo "</tr>";
            }
        } ?>
    </tbody>
</table>