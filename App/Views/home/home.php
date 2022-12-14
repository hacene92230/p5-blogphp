<?php
foreach ($tabpost as $cle => $valeur) {
    echo "<h2>" . $valeur->title . "</h2>";
    echo "<a href='index.php?page=posts&action=show&post=$valeur->id'>Consulter</a>";
}
