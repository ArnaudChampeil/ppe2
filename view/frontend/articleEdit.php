<?php $title = $data["title"]; ?>

<?php ob_start(); ?>

<form method="POST">
    <header class="header-area overlay section-padding" id="Article<?= $_GET["id"]; ?>">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
            <div class="page-title">
                <input type="text" name="title" class="form-control" value="<?php if(!empty($_SESSION["error"])){echo $_SESSION["article"]['title'];}else{echo $data["title"];} ?>" required>
            </div>
        </div>
    </header>

    <div class="section-padding gray-bg" id="Article<?= $_GET["id"]; ?>">
        <div class="container">
            <?php if(!empty($_SESSION["error"])) { ?>
                <div class="alert alert-danger">
                    <p>Vous n'avez pas modifié l'article correctement</p>
                    <ul>
                        <?php foreach($_SESSION['error'] as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="navbar">
                    <a class="btn btn-info navbar-right" href="?action=home#articles">Retour à l'écran d'accueil</a>

                    <button type="submit" class="btn btn-success navbar-right">Valider les modifications</button>

                    <a class="btn btn-danger navbar-right" href="#delArticle" data-toggle="modal">Supprimer</a>

                </div>

                <img class="center-block" src="public/img/articles/imgArticle<?= $data["id_article"].$data["extension"]; ?>" alt="<?= $data["title"]; ?>">

                <textarea name="content" rows="50" class="form-control" placeholder="Contenu de l'article"  required><?= $_SESSION["article"]["content"]; ?></textarea>

                <input type="text" name="link" class="form-control" value="<?= $_SESSION["article"]["link"]; ?>">

                <p class="navbar-right">Publié le <?= $data["dateCreation"]; ?></p>

            <?php }else{ ?>

                <div class="navbar">
                    <a class="btn btn-info navbar-right" href="?action=home#articles">Retour à l'écran d'accueil</a>

                    <button type="submit" class="btn btn-success navbar-right">Valider les modifications</button>

                    <a class="btn btn-danger navbar-right" href="#delArticle" data-toggle="modal">Supprimer</a>

                </div>

                <img class="center-block" src="public/img/articles/imgArticle<?= $data["id_article"].$data["extension"]; ?>" alt="<?= $data["title"]; ?>">

                <textarea name="content" rows="50" class="form-control" placeholder="Contenu de l'article"  required><?= $data["content"]; ?></textarea>

                <input type="text" name="link" class="form-control" value="<?= $data["link"]; ?>">

                <p class="navbar-right">Publié le <?= $data["dateCreation"]; ?></p>

            <?php } ?>
        </div>
    </div>
</form>

<!-- MODAL VALIDATION SUPRESSION ARTICLE -->
<div class="modal fade" id="delArticle" tabindex="-1" role="dialog" aria-labelledby="modalDelArticle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Etes vous certain de vouloir supprimer cette article ?
            </div>
            <div class="modal-body right">
                <a href="?action=article&id=<?= $_GET["id"]; ?>&article=deleteArticle" type="submit" class="btn btn-danger">Supprimer</a>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Fermer</button>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>