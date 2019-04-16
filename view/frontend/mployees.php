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

                <?php //condition sir l'employé est habilité et s'il est employé ?>
                <a href="#addEmployee" class="button white" data-toggle="modal">Créer un nouveau compte employé</a>

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
                                <h2>Direction</h2>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="single-team">
                                        <div class="team-photo">
                                            <img src="public/img/test1.jpg" alt="">
                                        </div>
                                        <h4>JEMY SEDONCE</h4>
                                        <h6>Co. Founder</h6>
                                        <ul class="social-menu">
                                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="single-team">
                                        <div class="team-photo">
                                            <img src="public/img/test2.jpg" alt="">
                                        </div>
                                        <h4>DEBORAH BROWN</h4>
                                        <h6>UX Designer</h6>
                                        <ul class="social-menu">
                                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="single-team">
                                        <div class="team-photo">
                                            <img src="images/team-section-3.png" alt="">
                                        </div>
                                        <h4>HARRY BANKS</h4>
                                        <h6>Founder</h6>
                                        <ul class="social-menu">
                                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="single-team">
                                        <div class="team-photo">
                                            <img src="images/team-section-4.png" alt="">
                                        </div>
                                        <h4>VICTORIA CLARK</h4>
                                        <h6>Creative Director</h6>
                                        <ul class="social-menu">
                                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="item row">
                    <div class="v-center">

                        <div class="container">
                            <div class="caption-title" data-animation="animated fadeInUp">
                                <h2>Le cadre supérieur de santé</h2>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="single-team">
                                        <div class="team-photo">
                                            <img src="public/img/test1.jpg" alt="">
                                        </div>
                                        <h4>JEMY SEDONCE</h4>
                                        <h6>Co. Founder</h6>
                                        <ul class="social-menu">
                                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="item row">
                    <div class="v-center">
                        <div class="container">
                            <div class="caption-title" data-animation="animated fadeInUp">
                                <h2>Personnel de santé</h2>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="single-team">
                                        <div class="team-photo">
                                            <img src="public/img/test1.jpg" alt="">
                                        </div>
                                        <h4>JEMY SEDONCE</h4>
                                        <h6>Co. Founder</h6>
                                        <ul class="social-menu">
                                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="item row">
                    <div class="v-center">
                        <div class="container">
                            <div class="caption-title" data-animation="animated fadeInUp">
                                <h2>A définir</h2>
                            </div>
                            <div class="caption-desc" data-animation="animated fadeInDown">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="single-team">
                                        <div class="team-photo">
                                            <img src="public/img/test1.jpg" alt="">
                                        </div>
                                        <h4>JEMY SEDONCE</h4>
                                        <h6>Co. Founder</h6>
                                        <ul class="social-menu">
                                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

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
                    <strong>Le cadre supérieur de santé</strong>.
                </li>
                <li data-target="#caption_slide" data-slide-to="2">
                    <strong>Personnel de santé</strong>.
                </li>
                <li data-target="#caption_slide" data-slide-to="3">
                    <strong>A définir </strong>.
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
                Créer un espace de connexion employé
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
                        <option value="Infirmier">Infirmier</option>
                        <option value="Médecin Généraliste">Médecin Généraliste</option>
                        <option value="choix3">Choix existantiel</option>
                        <option value="choix4">Choix 4</option>
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