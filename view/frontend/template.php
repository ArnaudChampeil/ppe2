<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="auteur" content="Arnaud Champeil">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title><?= htmlspecialchars($title); ?></title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="public/img/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/css/themify-icons.css">
    <link rel="stylesheet" href="public/css/magnific-popup.css">
    <link rel="stylesheet" href="public/css/animate.css">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="public/css/normalize.css">
    <link rel="stylesheet" href="public//css/style.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <script src="public/js/vendor/modernizr-2.8.3.min.js"></script>

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target="#primary-menu">

    <div class="preloader">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
    <?php navbarEmployees(); navbarPatitents(); ?>
    <?= $content; ?>

    <!--Vendor-JS-->
    <script src="public/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="public/js/vendor/bootstrap.min.js"></script>
    <!--Plugin-JS-->
    <script src="public/js/owl.carousel.min.js"></script>
    <script src="public/js/contact-form.js"></script>
    <script src="public/js/jquery.parallax-1.1.3.js"></script>
    <script src="public/js/scrollUp.min.js"></script>
    <script src="public/js/magnific-popup.min.js"></script>
    <script src="public/js/wow.min.js"></script>
    <!--Main-active-JS-->
<script src="public/js/main.js"></script>
</body>