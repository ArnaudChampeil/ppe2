<?php $title = "Channels"; ?>

<?php ob_start(); ?>

<header class="header-area overlay full-height relative v-center" id="channels">
    <div class="absolute anlge-bg"></div>
    <div class="container">
        <div class="row v-center">
            <div class="col-xs-12 col-md-7 header-text">
                <h2>Liste des salons de discussion de l'hôpital</h2>
                <p>
                    Discutez avec les autres patients de l'hôpital en parcourant les différents salons de discussion mis à votre disposition.
                </p>
                <a href="#channelsGroup" class="button white">Voir</a>
            </div>
        </div>
    </div>
</header>
<div class="section-padding gray-bg" id="channelsGroup">
    <div class="container">

        <?php if(!empty($_SESSION["success"])) : ?>
            <div class="alert alert-success"><?= $_SESSION["success"]["channel"]; ?></div>
        <?php endif; ?>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                <div class="page-title">
                    <h2>Liste des salons</h2>
                </div>
            </div>
        </div>
        <?php if (access4()): ?>
            <button type="button" class="btn btn-block btn-info" data-toggle="collapse" data-target="#collapseAddChannel" aria-expanded="true" aria-controls="collapseOne">Créer un nouveau salon</button>
        <?php endif; ?>
        <div id="collapseAddChannel" class="collapse" aria-labelledby="headingOne">
            <div class="card-body form-control">

                <form action="" id="" method="POST" class="">
                    <input type="text" name="name" class="form-control" placeholder="Nom du salon" required="required">
                    <textarea name="description" rows="3" class="form-control" placeholder="Description du salon" required="required"></textarea>

                    <button type="submit" class="button">Créer</button>
                </form>

            </div>
        </div>


        <ul class="list-unstyled">
            <?php while($data = $channels->fetch(PDO::FETCH_ASSOC)): ?>
            <li class="media">
                <div class="media-body">
                    <h5 class="mt-0 mb-1">
                        <?= $data["name"]; ?>
                        <a href="?action=channel&id_channel=<?= $data["id_channel"]; ?>" class="btn btn-info">Entrer</a>
                        <?php if (access4()) : ?>
                            <a href="#delChannel" class="btn btn-danger" data-toggle="modal">Supprimer</a>
                        <?php endif; ?>
                    </h5>
                    <?= $data["description"]; ?>
                </div>
            </li>
            <!-- MODAL VALIDATION SUPRESSION SALON -->
            <div class="modal fade" id="delChannel" tabindex="-1" role="dialog" aria-labelledby="modalDelChannel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            Etes vous certain de vouloir supprimer le salon ?
                        </div>
                        <div class="modal-body right">
                            <a href="?action=channels&channel=deleteChannel&id_channel=<?= $data["id_channel"]; ?>" type="submit" class="btn btn-danger">Supprimer</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </ul>

    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>