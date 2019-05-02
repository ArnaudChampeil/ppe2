<?php $title = "Espace employés"; ?>

<?php ob_start(); ?>

<header class="header-area overlay full-height relative v-center" id="employees">
    <div class="absolute anlge-bg"></div>
    <div class="container">
        <div class="row v-center">
            <div class="col-xs-12 col-md-7 header-text">
                <h2>Liste des employés de l'hôpital</h2>
                <p>
                    Effectuez une recherche pour trouver la personne dont vous avez besoin.
                </p>
                <a href="#employeesGroup" class="button white">Voir</a>

                <?php if (access1()) : ?>
                    <a href="#addEmployee" class="button white" data-toggle="modal">Créer un nouveau compte employé</a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</header>


<section class="section-padding gray-bg" id="employeesGroup">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                <div class="page-title">
                    <h2>Equipe soignante</h2>
                    <p>Voici le personnel de santée de l'hôpital</p>
                </div>
            </div>
        </div>

        <div id="caption_slide" class="carousel slide caption-slider" data-ride="carousel">
            <div class="carousel-inner" role="listbox">

                <div class="item active row">
                    <div class="v-center">
                        <div class="container">
                            <div class="caption-title" data-animation="animated fadeInUp">
                                <h2>La direction</h2>
                                <p>
                                    Ils assurent la gestion administrative de l'hôpital.
                                </p>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">

                                <?php while($data = $dir->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="single-team">
                                            <div class="team-photo">
                                                <img src="public/img/avatar.png" alt="">
                                            </div>
                                            <h4><?= $data["name"].' '.$data["firstname"]; ?> </h4>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="item row">
                    <div class="v-center">
                        <div class="container">
                            <div class="caption-title" data-animation="animated fadeInUp">
                                <h2>Le cadre supérieur de santé</h2>
                                <p>Ils assurent la gestion et l’organisation des soins sur le pôle.</p>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">


                                <?php while($data = $sup->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="single-team">
                                            <div class="team-photo">
                                                <img src="public/img/avatar.png" alt="">
                                            </div>
                                            <h4><?= $data["name"].' '.$data["firstname"]; ?> </h4>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="item row">
                    <div class="v-center">
                        <div class="container">
                            <div class="caption-title" data-animation="animated fadeInUp">
                                <h2>Les médecins</h2>
                                <p>
                                    Ils ont la responsabilité des visites, examens et traitements vous concernant.
                                </p>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">

                                <?php while($data = $med->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="single-team">
                                            <div class="team-photo">
                                                <img src="public/img/avatar.png" alt="">
                                            </div>
                                            <h4><?= $data["name"].' '.$data["firstname"]; ?> </h4>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="item row">
                    <div class="v-center">
                        <div class="container">
                            <div class="caption-title" data-animation="animated fadeInUp">
                                <h2>Les sages-femmes</h2>
                                <p>
                                    Elles assurent le suivi de votre grossesse et les soins de votre accouchement.
                                </p>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">

                                <?php while($data = $sag->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="single-team">
                                            <div class="team-photo">
                                                <img src="public/img/avatar.png" alt="">
                                            </div>
                                            <h4><?= $data["name"].' '.$data["firstname"]; ?> </h4>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="item row">
                    <div class="v-center">
                        <div class="container">
                            <div class="caption-title" data-animation="animated fadeInUp">
                                <h2>Les cadres de santé</h2>
                                <p>
                                    Ils sont responsables de soins infirmiers, médico-techniques ou de rééducation dans l’unité dans laquelle vous êtes hospitalisé
                                    et garantissent leur bon fonctionnement. Ils sont à votre disposition pour recueillir vos demandes, vous informer et vous conseiller.
                                </p>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">

                                <?php while($data = $cad->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="single-team">
                                            <div class="team-photo">
                                                <img src="public/img/avatar.png" alt="">
                                            </div>
                                            <h4><?= $data["name"].' '.$data["firstname"]; ?> </h4>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="item row">
                    <div class="v-center">
                        <div class="container">
                            <div class="caption-title" data-animation="animated fadeInUp">
                                <h2>Les infirmiers</h2>
                                <p>
                                    Ils exercent un rôle relationnel, éducatif et technique pour maintenir, restaurer et promouvoir votre santé et veiller à votre confort.
                                    Ils dispensent les soins prescrits par les médecins et assurent une surveillance constante de votre état de santé.
                                </p>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">

                                <?php while($data = $inf->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="single-team">
                                            <div class="team-photo">
                                                <img src="public/img/avatar.png" alt="">
                                            </div>
                                            <h4><?= $data["name"].' '.$data["firstname"]; ?> </h4>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="item row">
                    <div class="v-center">
                        <div class="container">
                            <div class="caption-title" data-animation="animated fadeInUp">
                                <h2>Les aides-soignants</h2>
                                <p>
                                    Ils secondent les infirmiers dans le domaine de l’hygiène, veillent à votre confort et prennent soin de votre environnement.
                                </p>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">

                                <?php while($data = $aid->fetch(PDO::FETCH_ASSOC)) : ?>

                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="single-team">
                                            <div class="team-photo">
                                                <img src="public/img/avatar.png" alt="">
                                            </div>
                                            <h4><?= $data["name"].' '.$data["firstname"]; ?> </h4>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="item row">
                    <div class="v-center">
                        <div class="container">
                            <div class="caption-title" data-animation="animated fadeInUp">
                                <h2>Les brancardiers</h2>
                                <p>
                                    Ils facilitent vos déplacements dans les différents services de l’hôpital.
                                </p>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">

                                <?php while($data = $bra->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="single-team">
                                            <div class="team-photo">
                                                <img src="public/img/avatar.png" alt="">
                                            </div>
                                            <h4><?= $data["name"].' '.$data["firstname"]; ?> </h4>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Indicators -->
            <ol class="carousel-indicators caption-indector">
                <li data-target="#caption_slide" data-slide-to="0" class="active">
                    <strong>Direction</strong>
                </li>
                <li data-target="#caption_slide" data-slide-to="1">
                    <strong>Cadre supérieur de santé</strong>.
                </li>
                <li data-target="#caption_slide" data-slide-to="2">
                    <strong>Médecins</strong>.
                </li>
                <li data-target="#caption_slide" data-slide-to="3">
                    <strong>Sages-femmes</strong>.
                </li>
                <li data-target="#caption_slide" data-slide-to="4">
                    <strong>Cadres de santé</strong>.
                </li>
                <li data-target="#caption_slide" data-slide-to="5">
                    <strong>Infirmiers</strong>.
                </li>
                <li data-target="#caption_slide" data-slide-to="6">
                    <strong>Aides-soignants</strong>.
                </li>
                <li data-target="#caption_slide" data-slide-to="7">
                    <strong>Brancardiers</strong>.
                </li>
            </ol>
        </div>
    </div>
</section>

<!-- MODAL CREATION EMPLOYE -->
<div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="modaladdEmployee" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="" method="POST">
            <div class="modal-header">
                Créer un compte employé
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Entrer le nom de l'employé">
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Entrer le prénom de l'employé">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Entrer l'e-mail de l'employé">
                </div>
                <div class="form-group">
                    <label for="post">Poste</label>
                    <select name="post" class="form-control" id="post">
                        <option value="Brancardier">Brancardier</option>
                        <option value="Aide-soignant">Aide-soignant</option>
                        <option value="Infirmier">Infirmier</option>
                        <option value="Cadre de santé">Cadre de santé</option>
                        <option value="Sage-femme">Sage-femme</option>
                        <option value="Médecin">Médecin</option>
                        <option value="Cadre supérieur de santé">Cadre supérieur de santé</option>
                        <option value="Direction">Direction</option>
                    </select>
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