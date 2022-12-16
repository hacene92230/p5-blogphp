<?php
echo "<h2>" . $showtab["title"] . "</h2>";
echo "<p>" . $showtab['content'] . "</p>";
?>
<h2>Commentaires</h2>
<?php
foreach ($show_comments as $cle => $valeur) {
    echo "<p>".$valeur["content"]."</p>";
}
if (isset($_SESSION["utilisateurs"])) {
    include("../App/Views/comments/new.php");
}
?>