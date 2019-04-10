<?php $title = "Paramètres"; ?>

<?php ob_start(); ?>

<header class="header-area overlay section-padding" id="settings">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
        <div class="page-title">
            <h2>Paramètres du compte</h2>
        </div>
    </div>
</header>

<section class="section-padding gray-bg">
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h1 class="display-4"><?= $data["name"]." ".$data["firstname"]; ?></h1>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">

                            <p>
                                <?php if(isset($data["id_patient"])){ echo "Patient N°".$data["id_patient"]; } ?><br>
                                <?php if(isset($data["login"])){ echo "Identifiant : ".$data["login"]; } ?><br>
                                Email : <?= $data["email"]; ?><br>
                                Maladie : <?= $data["disease"]; ?><br>
                                <?= $data["nbMessages"]; ?> messages<br>
                            </p>
                        </div>
                    </div>
                    <footer class="blockquote-footer">
                        Compte crée le
                        <cite title="Source Title"><?= $data["creationDate"]; ?></cite>
                        <a href="?action=settings&settings=edit" class=" navbar-right">Modifier</a>
                    </footer>
                </blockquote>
            </div>
        </div>

    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>