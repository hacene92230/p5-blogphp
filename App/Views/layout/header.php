<!DOCTYPE html>
<html lang="fr">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-+LcEbO+ldb8cnx1aXZQ2N/K0A2WzJ6UfYYdAi+aN/P5Wgx5xE1HX0BqOvM8WUhwgMxdD6oGK6fvL8WK1/CxG2XA==" crossorigin="anonymous" />
  
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
<header class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <?php if(isset($_SESSION['utilisateurs'])) : ?>
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> <?= $_SESSION['utilisateurs']['firstname'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?page=users&action=edit">
              <i class="fas fa-edit"></i> Mon profil
            </a>
            <?php if($_SESSION['utilisateurs']['profil'] == 1) : ?>
              <a class="dropdown-item" href="index.php?page=admin&action=home">
                <i class="fas fa-cog"></i> Administration
              </a>
            <?php endif; ?>
            <a class="dropdown-item" href="index.php?page=users&action=logout">
              <i class="fas fa-sign-out-alt"></i> Se déconnecté
            </a>
          </div>
        <?php else : ?>
          <a class="nav-link text-white" href="index.php?page=users&action=login">
            <i class="fas fa-sign-in-alt"></i> Connexion
          </a>
          <a class="nav-link text-white" href="index.php?page=users&action=register">
            <i class="fas fa-user-plus"></i> Inscription
          </a>
        <?php endif; ?>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
        <i class="fas fa-search"></i    
      </form>
  </div>
</header>