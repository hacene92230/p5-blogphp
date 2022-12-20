<h2 class="text-center mb-4">Mon profil</h2>
<form method="post" action="index.php?page=users&action=delete" class="mx-auto w-50">
  <button type="submit" name="supprimer" class="btn btn-danger w-100 mt-3">Supprimer mon compte</button>
</form>
<form method="post" action="" class="mx-auto w-50">
  <div class="form-group">
    <label for="firstname" class="text-secondary font-weight-bold">Prénom</label>
    <input id="firstname" name="firstname" type="text" size="50" value="<?= $firstname ?>" class="form-control bg-light border-0 rounded-pill shadow-sm" />
  </div>
  <div class="form-group">
    <label for="email" class="text-secondary font-weight-bold">Email</label>
    <input id="email" name="email" type="mail" size="50" value="<?= $email ?>" class="form-control bg-light border-0 rounded-pill shadow-sm" />
  </div>
  <div class="form-group">
    <label for="password" class="text-secondary font-weight-bold">Mot de passe</label>
    <input id="password" name="password" type="password" size="50" class="form-control bg-light border-0 rounded-pill shadow-sm" />
  </div>
  <button type="submit" name="edit" class="btn btn-success w-100 mt-3">Modifier</button>
</form>
