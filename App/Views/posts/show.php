<div class="container mt-5">
    <h1 class="display-4 text-primary text-center mb-3"><?= $showtab["title"] ?></h1>
    <p class="lead"><?= $showtab['content'] ?></p>

    <h2 class="text-secondary text-center mt-5">Commentaires</h2>

    <?php foreach ($show_comments as $cle => $valeur) : ?>
        <blockquote class="blockquote my-3">
            <p class="mb-0"><?= $valeur["content"] ?></p>
        </blockquote>
    <?php endforeach; ?>

    <?php if (isset($_SESSION["utilisateurs"])) : include("../App/Views/comments/new.php");
    endif; ?>
</div>