<!DOCTYPE html>
<html lang="fr">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<head>
<title><?= $title; ?> Mon Blog Hacène</title>
<link href="style.css" rel="stylesheet">  
<title><?= $title; ?> Blog Hacène Sahraoui</title>
<link href="style.css" rel="stylesheet">
    </head>
<body>
<header>
<p>HACENE SAHRAOUI</p>
<p><a href="index.php">Accueil</a></p>
<?php
if(isset($_SESSION['utilisateurs']))
{
?>
<li role="profil" class="nav nav-tabs" class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <?= $_SESSION['utilisateurs']['firstname'] ?> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
<li><a href="index.php?page=users&action=edit">Mon profil</a></li>

<?php
if($_SESSION['utilisateurs']['profil'] == 1)
{ ?>
<li><a href="index.php?page=admin&action=home">Administration</a></li>
<?php
}
?>
<li><a href="index.php?page=users&action=logout">Se déconnecté</a></li>
      </ul>
<?php
}
else
{
	?>
<a href="index.php?page=users&action=login">Connexion</a>
<a href="index.php?page=users&action=register">Inscription</a>
<?php
}
?>
</header>