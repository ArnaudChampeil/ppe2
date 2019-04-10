<?php $title = "Administration des articles"; ?>

<?php ob_start(); ?>

<header class="header-area overlay section-padding" id="channelsGroup">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
        <div class="page-title">
            <h2>Administration des articles</h2>
        </div>
    </div>
</header>

<div class="section-padding gray-bg" id="channelsGroup">
    <div class="container">

        <button type="button" class="btn btn-block btn-success" data-toggle="collapse" data-target="#collapseAddArticle" aria-expanded="true" aria-controls="collapseOne">Ecrire un nouvel article</button>

        <div id="collapseAddArticle" class="collapse" aria-labelledby="headingOne">
            <form action="" method="POST" class="card-body form-control" enctype="multipart/form-data">
                <input type="text" name="title" class="form-control" placeholder="Titre" required>
                <textarea name="content" rows="20" class="form-control" placeholder="Contenu de l'article" required></textarea>
                <input type="hidden" name="MAX_FILE_SIZE" value="600000" /> <!-- Limite 600ko  FONCTIONNE PAS -->
                <input type="text" name="link" class="form-control" placeholder="Lien de l'article (si l'article vient d'un autre site)">
                <input type="file" name="imgArticle" class="form-control" placeholder="Upload la photo de l'image" required>

                <button type="submit" class="button">Publier</button>
            </form>
        </div>
        <div class="page-title">
            <h1>Liste des articles</h1>
        </div>

        <ul class="list-unstyled">
            <?php while($data = $articles->fetch(PDO::FETCH_ASSOC)) : ?>

                <a href="?action=article&id=<?= $data["id_article"]; ?>">
                    <li class="media">
                        <img src="public/img/articles/imgArticle<?= $data["id_article"].$data["extension"]; ?>" class="mr-3" width="100" alt="<?= $data["title"]; ?>">
                        <div class="media-body">
                            <h3 class="mt-0 mb-1"><?= $data["title"]; ?></h3>
                            Date de publication : <?= $data["dateCreation"]; ?>
                        </div>
                    </li>
                </a>

            <?php endwhile;  ?>
        </ul>

    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>