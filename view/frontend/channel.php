<?php $title = "Channel n°".$_GET["id_channel"]; ?>

<?php ob_start(); ?>

<header class="header-area overlay section-padding" id="channelN<?= $_GET["id_channel"]; ?>">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
        <div class="page-title">
            <h2>Channel n°<?= $_GET["id_channel"]; ?></h2>
        </div>
    </div>
</header>

<div class="section-padding gray-bg" id="channelN<?= $_GET["id_channel"]; ?>">
    <div class="container">
        <div class="scroll" id="message">
            <?php //MESSAGE A DROITE SI L'USER L'A ECRIT SINON MESSAGE A GAUCHE
            while($data = $message->fetch(PDO::FETCH_ASSOC)):/*
                if ($data["id_account"] != $_SESSION["id_account"]) {*/
                    ?>
                    <div class="left">
                        <div class="head-message"><?= $data["firstname"]; ?> <span class="head-message">le <?= $data["dateCreation"]; ?></span></div>
                        <div class="message">
                            <?= $data["content"]; ?>
                        </div>
                        <?php if (access4()) : ?>
                            <a href="#delMessage" class="badge head-message" data-toggle="modal">Supprimer</a>
                        <?php endif; ?>
                    </div>
                    <?php/*
                }else{
                    ?>
                    <div class="message-right">
                        <div class="head-message"><?= $data["firstname"]; ?> <span class="head-message">le <?= $data["dateCreation"]; ?></span></div>
                        <div class="message">
                            <?= $data["content"]; ?>
                        </div>
                        <div><a href="#delMessage" class="badge head-message" data-toggle="modal">Supprimer</a></div>
                    </div>
                    <?php
                }*/
                ?>
                <?= $data["id_message"]; // L'ID N'AUGMENTE PLUS APRES LE BLOC DU MODAL ?>
                <!-- MODAL VALIDATION SUPRESSION MESSAGE -->
                <div class="modal fade" id="delMessage" tabindex="-1" role="dialog" aria-labelledby="modalDelMessage" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                Etes vous certain de vouloir supprimer ce message ?
                            </div>
                            <div class="modal-body right">
                                <?= $data["id_message"]; ?><a href="?action=channel&channel=deleteMessage&id_message=<?= $data["id_message"]; ?>&id_channel=<?= $_GET["id_channel"]; ?>" type="submit" class="btn btn-danger">Supprimer</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            ?>
        </div>
        <form action="#message" method="POST" class="form-group">
            <label for="message">Votre message</label>
            <textarea class="form-control" name="message" id="message" rows="1"></textarea>
            <button type="submit" class="button">Publier</button>
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>