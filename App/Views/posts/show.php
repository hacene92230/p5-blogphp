<?php
echo "<h2>" . $showtab["title"] . "</h2>";
echo "<p>" . $showtab['content'] . "</p>";
?>
<?php
if (isset($_SESSION["utilisateurs"])) {
    include("../App/Views/comments/new.php");
}
?>