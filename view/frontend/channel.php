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
            while($data = $message->fetch(PDO::FETCH_ASSOC)):
                ?>
                <div class="left">
                    <div class="head-message"><?= $data["firstname"]; ?> <span class="head-message">le <?= $data["dateCreation"]; ?></span></div>
                    <div class="message">
                        <?= $data["content"]; ?>
                    </div>
                    <?php if (access4()) : ?>
                        <a class="badge head-message" href="?action=channel&channel=deleteMessage&id_message=<?= $data["id_message"]; ?>&id_channel=<?= $_GET["id_channel"]; ?>" type="submit">Supprimer</a>
                    <?php endif; ?>
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