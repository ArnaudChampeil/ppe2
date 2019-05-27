<?php $title = "CHU d'Assas"; ?>

<?php ob_start(); ?>

<!--Header-area-->
<header class="header-area overlay full-height relative v-center" id="home-page">

    <div class="absolute anlge-bg"></div>
    <div class="container">
        <div class="row v-center">
            <div class="col-xs-12 col-md-7 header-text">
                <h2>Bienvenue dans l'hôpital d'Assas</h2>
                <p>
                    Retrouvez toute l'actualité de l'hôpital, connectez vous avec vos camarades de chambres
                </p>
                <a href="?action=home" class="button white">Entrer</a>
            </div>
        </div>
    </div>

</header>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>