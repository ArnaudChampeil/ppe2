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



        <?php while($data = $message->fetch(PDO::FETCH_ASSOC)): ?>
            Message de <?= $data["firstname"]; ?> <span class="badge">le <?= $data["dateCreation"]; ?></span>
            <div class="alert alert-info" role="alert">
                <?= $data["content"]; ?>
            </div>
        <?php endwhile; ?>

        <form action="" method="POST" class="form-group">
            <label for="message">Votre message</label>
            <textarea class="form-control" name="message" id="message" rows="1"></textarea>
            <button type="submit" class="button">Publier</button>
        </form>

    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
