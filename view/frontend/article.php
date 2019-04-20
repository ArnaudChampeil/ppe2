<?php $title = $data["title"]; ?>

<?php ob_start(); ?>

<header class="header-area overlay section-padding" id="Article<?= $_GET["id"]; ?>">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
        <div class="page-title">
            <h2><?= $data["title"]; ?></h2>
        </div>
    </div>
</header>

<div class="section-padding gray-bg" id="Article<?= $_GET["id"]; ?>">
    <div class="container">

        <div class="navbar">
            <a class="btn btn-info navbar-right" href="?action=home#articles">Retour à l'écran d'accueil</a>
            <?php if (access3()) : ?>
                <a class="btn btn-success navbar-right" href="?action=article&id=<?= $_GET["id"]; ?>&article=edit">Modifier l'article</a>
            <?php endif; ?>

        </div>


        <img class="center-block" src="public/img/articles/imgArticle<?= $data["id_article"].$data["extension"]; ?>" alt="<?= $data["title"]; ?>">

        <p class="section-padding">
            <?= $data["content"]; ?>
        </p>

        <?php if(!empty($data["link"])): ?>
            <a href="<?= $data["link"]; ?>">-> Voir l'article <- </a>
        <?php endif ; ?>

        <p class="navbar-right">Publié le <?= $data["dateCreation"]; ?></p>

    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>