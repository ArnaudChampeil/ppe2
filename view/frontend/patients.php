<?php $title = "Liste des patients"; ?>

<?php ob_start(); ?>

<header class="header-area overlay full-height relative v-center" id="patients">
    <div class="absolute anlge-bg"></div>
    <div class="container">
        <div class="row v-center">
            <div class="col-xs-12 col-md-7 header-text">
                <h2>Liste des patients de l'hôpital</h2>
                <p>
                    Effectuez une recherche pour trouver le patient que vous cherchez.
                </p>
                <a href="#patientsGroup" class="button white">Voir</a>

                <?php if (access2()) : ?>
                    <a href="#addPatient" class="button white" data-toggle="modal">Créer un nouveau compte patient</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<section class="section-padding gray-bg" id="patientsGroup">
    <div class="container">

        <?php if(!empty($_SESSION["error"])) : ?>
            <div class="alert alert-danger">
                <p>Vous n'avez pas rempli l'inscription correctement</p>
                <ul>
                    <?php foreach($_SESSION['error'] as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php
        endif; ?>
        <?php if(!empty($_SESSION["success"])) : ?>
            <div class="alert alert-success"><?= $_SESSION["success"]["account"]; ?></div>
        <?php endif; ?>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                <div class="page-title">
                    <h2>Patients</h2>
                    <p>

                    </p>
                </div>
            </div>
        </div>
        <form class="form-inline my-2 my-lg-0 navbar-right" method="POST" action="#patientsGroup">
            <button class="button my-2 my-sm-0 navbar-right" type="submit">Chercher</button>
            <input class="form-control mr-sm-2 navbar-right" type="search" placeholder="" aria-label="Recherche" name="search" value="<?php if(isset($_POST["search"])){echo $_POST["search"];}; ?>">
        </form>

        <div class="accordion" id="accordionExample">

            <div class="card">

                <?php while($data = $patients->fetch(PDO::FETCH_ASSOC)) : ?>

                    <div class="card-header" id="heading<?= $data["id_patient"]; ?>">
                        <h4 class="mb-0">
                            <button class="list-group-item" type="button" data-toggle="collapse" data-target="#collapse<?= $data["id_patient"]; ?>" aria-expanded="true" aria-controls="collapse<?= $data["id_patient"]; ?>">
                                Patient N°<?= $data["id_patient"]; ?>
                            </button>
                        </h4>
                    </div>
                    <div id="collapse<?= $data["id_patient"]; ?>" class="collapse" aria-labelledby="heading<?= $data["id_patient"]; ?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item active">N°<?= $data["id_patient"]; ?></li>
                                <li class="list-group-item">Nom : <?= $data["name"]; ?></li>
                                <li class="list-group-item">Prénom : <?= $data["firstname"]; ?></li>
                                <li class="list-group-item">Identifiant : <?= $data["login"]; ?></li>
                                <li class="list-group-item">Email : <?= $data["email"]; ?></li>
                                <li class="list-group-item">Maladie : <?= $data["disease"]; ?></li>
                                <li class="list-group-item">Compte crée le <?= $data["creationDate"]; ?></li>
                                <li class="list-group-item"><?= $data["nbMessages"]; ?> messages</li>
                            </ul>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div>
        </div>
    </div>
</section>

<!-- MODAL CREATION PATIENT -->
<div class="modal fade" id="addPatient" tabindex="-1" role="dialog" aria-labelledby="modaladdPatient" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="" method="POST">
            <div class="modal-header">
                Créer un espace de connexion patient
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Entrer le nom du patient">
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Entrer le prénom du patient">
                </div>
                <div class="form-group">
                    <label for="disease">Maladie</label>
                    <input type="text" name="disease" class="form-control" id="disease" placeholder="Entrer la maladie du patient">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="button">Créer</button>
            </div>
        </form>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>