<form method="post" action="index.php?page=comments&action=new&post=<?= $_GET['post'] ?>" class="mx-auto w-50">
  <div class="form-group">
    <label for="comment" class="text-secondary font-weight-bold">Votre commentaire</label>
    <textarea id="content" name="content" placeholder="saisir votre commentaire" required class="form-control bg-light border-0 rounded-pill shadow-sm"></textarea>
  </div>
  <button type="submit" name="new" class="btn btn-success w-100 mt-3">Commenter</button>
</form>