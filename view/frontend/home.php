<?php $title = "CHU d'Assas"; ?>

<?php ob_start(); ?>

<header class="header-area overlay full-height relative v-center" id="home">
    <div class="absolute anlge-bg"></div>
    <div class="container">
        <div class="row v-center">
            <div class="col-xs-12 col-md-7 header-text">
                <h2>Hôpital d'Assas</h2>
                <p>L'hôpital d'Assas est un établissement privé ayant son propre réseau de communication et son propre système de relation interpatients</p>
            </div>
            <div class="hidden-xs hidden-sm col-md-5 text-right">
                <div class="screen-box screen-slider">
                    <div class="item">
                        <img src="public/img/chu1.jpg" alt="Photo 1">
                    </div>
                    <div class="item">
                        <img src="public/img/chu2.jpg" alt="Photo 2">
                    </div>
                    <div class="item">
                        <img src="public/img/chu3.jpg" alt="Photo 3">
                    </div>
                    <div class="item">
                        <img src="public/img/chu4.jpg" alt="Photo 4">
                    </div>
                    <div class="item">
                        <img src="public/img/chu5.jpg" alt="Photo 5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="gray-bg  section-padding" id="articles">
    <div class="container">
        <h1 class="display-4">Actualités</h1>
        <p class="lead">Retrouvez toute l'actualité de l'hôpital à travers différents articles</p>

        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="testimonials">

                <?php while($data = $articles->fetch(PDO::FETCH_ASSOC)) : ?>

                    <div class="testimonial">
                        <a href="?action=article&id=<?= $data["id_article"]; ?>">
                            <div class="testimonial-photo">
                                <img src="public/img/articles/imgArticle<?= $data["id_article"].$data["extension"]; ?>" alt="<?= $data["title"]; ?>">
                            </div>
                            <h3><?= $data["title"]; ?></h3>
                            <p>
                                <?= substr($data["content"], 0, 350)."..."; ?>
                            </p>
                        </a>
                    </div>

                <?php endwhile;  ?>

            </div>
        </div>
    </div>
</div>

<footer class="footer-area relative sky-bg" id="contact-page">
    <div class="footer-middle">
        <div class="container">

            <!-- COLLAPSE CONTACT -->
            <div id="collapseContact" class="collapse" aria-labelledby="headingOne">
                <div class="row">
                    <div class="modal-header col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                        <div class="page-title">
                            <h2>Contact</h2>
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="modal-body row">
                    <div class="col-xs-12 col-md-4">
                        <address class="side-icon-boxes">
                            <div class="side-icon-box">
                                <div class="side-icon">
                                    <img src="public/img/location-arrow.png" alt="">
                                </div>
                                <p><strong>Adresse: </strong> Avenue d'Assas <br />34000 Montpellier</p>
                            </div>
                            <div class="side-icon-box">
                                <div class="side-icon">
                                    <img src="public/img/phone-arrow.png" alt="">
                                </div>
                                <p><strong>Téléphone: </strong>
                                    <a href="callto:0102030405">01.02.03.04.05 (NUMERO BIDON)</a> <br />
                                    <a href="callto:0601020304">06.01.02.03.04 (NUMERO BIDON)</a>
                                </p>
                            </div>
                            <div class="side-icon-box">
                                <div class="side-icon">
                                    <img src="public/img/mail-arrow.png" alt="">
                                </div>
                                <p><strong>E-mail: </strong>
                                    <a href="mailto:youremail@example.com">chu-assas@chu-assas.com (E-MAIL BIDON)</a> <br />
                                    <a href="mailto:youremail@example.com">contact@chu-assas.com (E-MAIL BIDON)</a>
                                </p>
                            </div>
                        </address>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <form action="" id="" method="post" class="contact-form">
                            <div class="form-double">
                                <input type="text" id="form-name" name="name" placeholder="Votre nom" class="form-control" required="required">
                                <input type="email" id="form-email" name="email" class="form-control" placeholder="Adresse E-mail" required="required">
                            </div>
                            <input type="text" id="form-subject" name="form-subject" class="form-control" placeholder="Objet">
                            <textarea id="form-message" name="message" rows="5" class="form-control" placeholder="Votre message" required="required"></textarea>
                            <button type="submit" class="button">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 pull-right">
                    <ul class="social-menu text-right x-left">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter"></i></a></li>
                        <li><a href="#"><i class="ti-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">

                <a class="btn btn-default" href="?action=loginAdmin">Connexion Admin</a>
                <a class="btn btn-default" href="?action=loginE">Connexion E</a>
                <a class="btn btn-default" href="?action=loginP">Connexion P</a>
                <a class="btn btn-default" href="#connexion" data-toggle="modal">Connexion</a>
                <a class="btn btn-default" data-toggle="collapse" data-target="#collapseContact" aria-expanded="true" aria-controls="collapseOne">Contact</a>





                <div class="col-xs-12 text-center">
                    <p>&copy;Copyright 2018 All right resurved. Template réalisé par <i class="ti-heart" aria-hidden="true"></i><a href="https://colorlib.com">Colorlib</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- MODAL CONNEXION -->

<div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="modalConnexion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalConnexion">
                    Connexion
                    <a class="badge" data-toggle="tab" href="#tabP">Patients</a>
                    <a class="badge" data-toggle="tab" href="#tabE">Employés</a>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="tab-content">

                    <!-- tab Connexion Patient -->
                    <div id="tabP" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-12">

                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="login">Identifiant</label>
                                        <input type="text" name="login" class="form-control" id="login" placeholder="Entrer votre identifiant" value="<?php if(!empty($_COOKIE['email'])){ echo $_COOKIE['email']; }?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordP">Mot de passe</label>
                                        <input type="password" name="passwordP" class="form-control" id="passwordP" placeholder="Entrer votre mot de passe" value="<?php if(!empty($_COOKIE['password'])){ echo $_COOKIE['password']; }?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="button">Se connecter</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- tab Connexion Employé  -->
                    <div id="tabE" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">

                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="emailP" aria-describedby="emailHelp" placeholder="Entrer votre email" value="<?php if(!empty($_COOKIE['email'])){ echo $_COOKIE['email']; }?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordE">Mot de passe</label>
                                        <input type="password" name="passwordE" class="form-control" id="passwordE" placeholder="Entrer votre mot de passe" value="<?php if(!empty($_COOKIE['password'])){ echo $_COOKIE['password']; }?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="button">Se connecter</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>