<?php
session_start();
require_once "controller/frontend.php";

try {
    if (isset($_GET["action"])){
        //PAGE D'ACCUEIL
        $articles = see5Articles();
        if ($_GET["action"] == "home") {
            //CONNEXION PATIENT
            if(isset($_POST["login"]) && isset($_POST["passwordP"])){
                var_dump($_SESSION);
                if(verifyLoginPatient($_POST["login"],$_POST["passwordP"])){
                    loginPatient($_POST["login"]);
                    die();
                    //header("Location: index.php?action=home");
                }
            }
            //CONNEXION EMPLOYE
            /*if(isset($_POST["email"]) && isset($_POST["passwordE"])){
                if(verifyLoginPatient($_POST["email"],$_POST["passwordE"])){
                    loginPatient($_POST["email"]);
                    header("Location: index.php?action=home");
                }
            }*/
            require_once "view/frontend/home.php";
            exit();
        }
        //PAGE D'ARTICLE INDIVIDUELLE
        if ($_GET["action"] == "article" && !empty($_GET["id"])) {
            $article = new ArticlesManager();
            $data = $article->getArticle($_GET["id"]);
            //PAGE D'EDITION D'ARTICLE
            if(isset($_GET["article"]) == "edit"){
                //MODIFICATION
                if(isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["link"]) && isset($_GET["id"])){
                    editArticle($_POST["title"],$_POST["content"],$_POST["link"], $_GET["id"]);
                    header("Location: index.php?action=article&id=".$_GET["id"]);
                }
                require_once "view/frontend/articleEdit.php";
                exit();
            }
            //SUPPRESSION
            if(isset($_GET["article"]) == "deleteArticle"){
                deleteArticle($_GET["id"]);
                header("Location: index.php?action=home");
            }
            require_once "view/frontend/article.php";
            exit();
        }
        if(!empty($_SESSION["id_account"])){
            //PAGE D'ADMINISTRATION DES ARTICLES
            if($_GET["action"] == "articlesAdmin"){

                if(isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["link"]) && isset($_FILES["imgArticle"])){
                    addArticle($_POST["title"], $_POST["content"], $_POST["link"], $_SESSION["id_account"], $_FILES);
                    header("Location: index.php?action=articlesAdmin");
                }
                $articles = seeArticles();
                require_once "view/frontend/articlesAdmin.php";
                exit();
            }
            //PAGE EMPLOYES ************** "EMPLOYEES.PHP" N'EST PAS RECONNU COMME UN FICHIER PHP, LE FICHIER EST NOMMEE "MPLOYEES.PHP" POUR LE MOMENT **************
            if ($_GET["action"] == "employees") {
                //AJOUT D'EMPLOYEES
                if(isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["email"]) && isset($_POST["post"])){
                    addEmployee($_POST["name"], $_POST["firstname"], $_POST["email"], $_POST["post"]);
                    header("Location: index.php?action=employees");
                }
                $dir = seeEmployees("Direction");
                $sup = seeEmployees("Cadre supérieur de santé");
                $med = seeEmployees("Médecin");
                $sag = seeEmployees("Sage-femme");
                $cad = seeEmployees("Cadre de santé");
                $inf = seeEmployees("Infirmier");
                $aid = seeEmployees("Aide-soignant");
                $bra = seeEmployees("Brancardier");
                require_once "view/frontend/mployees.php";
                exit();
            }
            //PAGE PATIENTS
            if ($_GET["action"] == "patients") {
                //AJOUT DE PATIENT
                if(isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["disease"])){
                    addPatient($_POST["name"], $_POST["firstname"], $_POST["disease"]);
                    header("Location: index.php?action=patients");
                }
                //RECHERCHE D'UN PATIENT
                if(isset($_POST["search"])){
                    $patients = searchPatients($_POST["search"]);
                    require_once "view/frontend/patients.php";
                    exit();
                }else{
                    $patients = seePatients();
                    require_once "view/frontend/patients.php";
                    exit();
                }
            }
            //PAGE SALONS
            if ($_GET["action"] == "channels") {
                if(isset($_POST["name"]) && isset($_POST["description"])){
                    addChannel($_POST["name"], $_POST["description"]);
                    header("Location: index.php?action=channels#channelsGroup");
                }
                $channels = seeChannels();
                require_once "view/frontend/channels.php";
                exit();
            }
            //PAGE TCHAT
            if ($_GET["action"] == "channel") {
                if(isset($_POST["message"])){
                    addMessage($_POST["message"], $_SESSION["id_account"], $_GET["id_channel"]);
                    header("Location: index.php?action=channel&id_channel=".$_GET["id_channel"]);
                }
                $message = seeMessages($_GET["id_channel"]);
                require_once "view/frontend/channel.php";
                exit();
            }
            //PAGE PARAMETRES
            if($_GET["action"] == "settings"){
                if (isset($_POST["password"]) && isset($_POST["email"])){
                    updateSettings($_POST["password"], $_POST["email"], $_SESSION["id_account"]);
                    header("Location: index.php?action=settings");
                }
                $data = seeSettings($_SESSION["id_account"]);
                if(isset($_GET["settings"])  == "edit"){
                    require_once "view/frontend/settingsEdit.php";
                    exit();
                }
                require_once "view/frontend/settings.php";
                exit();
            }
        }else{
            echo "erreur";
        }

        //************** CONNEXION EMPLOYE TEMPORAIRE **************
        if ($_GET["action"] == "loginE") {
            loginEmployee();
            header("Location: index.php?action=home");
        }
        //************** CONNEXION PATIENT TEMPORAIRE **************
        if ($_GET["action"] == "loginP") {
            loginPatientA();
            header("Location: index.php?action=home");
        }
        //DECONNEXION
        if ($_GET["action"] == "logout") {
            logout();
            header("Location: index.php");
        }
    }else{
        //PAGE DE BIENVENUE
        require_once "view/frontend/welcome.php";
        exit();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
    /*
     * POUR FAIRE SA PROPRE PAGE D'ERREUR
    catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
    }
    */
}