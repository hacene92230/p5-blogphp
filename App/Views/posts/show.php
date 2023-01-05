<?php
echo "<h2>" . $showTab["title"] . "</h2>";
echo "<p>" . $showTab['content'] . "</p>";
?>
<h2>Commentaires</h2>
<?php
foreach ($showComments as $cle => $valeur) {
    print("<p>" . $valeur["content"] . "</p>");
}
if (isset($_SESSION["utilisateurs"])) {
    include("../App/Views/comments/new.php");
}
?>