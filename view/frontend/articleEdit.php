<?php $title = $data["title"]; ?>

<?php ob_start(); ?>

<form method="POST">
    <header class="header-area overlay section-padding" id="Article<?= $_GET["id"]; ?>">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
            <div class="page-title">
                <input type="text" name="title" class="form-control" value="<?= $data["title"]; ?>" required>
            </div>
        </div>
    </header>

    <div class="section-padding gray-bg" id="Article<?= $_GET["id"]; ?>">
        <div class="container">

            <div class="navbar">
                <a class="btn btn-info navbar-right" href="?action=home#articles">Retour à l'écran d'accueil</a>

                <button type="submit" class="btn btn-success navbar-right">Valider les modifications</button>

                <a class="btn btn-danger navbar-right" href="?action=article&id=<?= $_GET["id"]; ?>&article=deleteArticle">Supprimer</a>

            </div>

            <img class="center-block" src="public/img/articles/imgArticle<?= $data["id_article"].$data["extension"]; ?>" alt="<?= $data["title"]; ?>">

            <textarea name="content" rows="50" class="form-control" placeholder="Contenu de l'article"  required><?= $data["content"]; ?></textarea>

            <input type="text" name="link" class="form-control" value="<?= $data["link"]; ?>">

            <p class="navbar-right">Publié le <?= $data["dateCreation"]; ?></p>

        </div>
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>