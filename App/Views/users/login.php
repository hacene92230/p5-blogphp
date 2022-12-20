<h2 class="text-center mb-4">S'authentifier</h2>
<form method="post" action="" class="mx-auto w-50">
  <div class="form-group">
    <label for="email" class="text-secondary font-weight-bold">Votre Email</label>
    <input type="email" name="email" id="email" placeholder="saisir votre email" required class="form-control bg-light border-0 rounded-pill shadow-sm" />
  </div>
  <div class="form-group">
    <label for="password" class="text-secondary font-weight-bold">Votre mot de passe</label>
    <input type="password" name="password" id="password" placeholder="saisir votre mot de passe" required class="form-control bg-light border-0 rounded-pill shadow-sm" />
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme" value="1" <?php if(isset($_COOKIE['remembermeu'])) {echo 'checked="checked"';} else { echo ''; }?> >
    <label class="form-check-label text-secondary font-weight-bold" for="rememberme">Se souvenir de moi</label>
  </div>
  <button type="submit" name="login" class="btn btn-primary mt-3 w-100">Je me connecte</button>
</form>