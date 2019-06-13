<?php $title = "Liste des patients"; ?>

<?php ob_start(); ?>
    <div class="section-padding" id="channelsGroup">
        <div class="container">
            <div class="alert alert-danger">
                <h1>Erreur</h1>
                <p>La page que vous souhaitez afficher ne s'affiche pas.</p>
                <p>Vous n'avez pas l'autorisation.</p>
                <p><a href="?action=home" class="button white navbar-right">Retourner à la page d'accueil</a></p>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>