<?php
session_start();
require_once "controller/frontend.php";

try {
    if (isset($_GET["action"])){
        //PAGE D'ACCUEIL
        if ($_GET["action"] == "home") {
            //CONNEXION PATIENT
            if(isset($_POST["login"]) && isset($_POST["passwordP"])){
                if(verifyLoginPatient($_POST["login"],$_POST["passwordP"])){
                    loginPatient($_POST["login"]);
                    header("Location: index.php?action=home");
                    exit();
                }
            }
            //CONNEXION EMPLOYE
            if(isset($_POST["email"]) && isset($_POST["passwordE"])){
                if(verifyEmailEmployee($_POST["email"],$_POST["passwordE"])){
                    loginEmployee($_POST["email"]);
                    header("Location: index.php?action=home");
                    exit();
                }
            }
            $articles = see5Articles();
            require_once "view/frontend/home.php";
            unset($_SESSION["error"]);
            exit();
        }
        //PAGE D'ARTICLE INDIVIDUELLE
        if ($_GET["action"] == "article" && !empty($_GET["id"])) {
            $article = new ArticlesManager();
            $data = $article->getArticle($_GET["id"]);

            //PAGE D'EDITION D'ARTICLE
            if(isset($_GET["article"]) && access3()){
                if ($_GET["article"] == "edit") {
                    //MODIFICATION
                    if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["link"]) && isset($_GET["id"])) {
                        if (verifyEditArticle($_POST["title"], $_POST["content"], $_POST["link"])){
                            editArticle($_POST["title"], $_POST["content"], $_POST["link"], $_GET["id"]);
                            header("Location: index.php?action=article&id=" . $_GET["id"]);
                            exit();
                        }
                    }
                    require_once "view/frontend/articleEdit.php";
                    unset($_SESSION["error"]);
                    unset($_SESSION["article"]);
                    exit();
                }
                //SUPPRESSION
                if ($_GET["article"] == "deleteArticle") {
                    deleteArticle($_GET["id"]);
                    header("Location: index.php?action=home");
                    exit();
                }
            }
            require_once "view/frontend/article.php";
            unset($_SESSION["success"]);
            exit();
        }
        if(!empty($_SESSION["id_account"])){
            //PAGE D'ADMINISTRATION DES ARTICLES
            if($_GET["action"] == "articlesAdmin"){

                if(isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["link"]) && isset($_FILES["imgArticle"]) && access3()){
                    addArticle($_POST["title"], $_POST["content"], $_POST["link"], $_SESSION["id_account"], $_FILES);
                    header("Location: index.php?action=articlesAdmin");
                    exit();
                }
                $articles = seeArticles();
                require_once "view/frontend/articlesAdmin.php";
                unset($_SESSION["error"]);
                unset($_SESSION["success"]);
                exit();
            }
            //PAGE EMPLOYES
            if ($_GET["action"] == "employees") {
                //AJOUT D'EMPLOYEES
                if(isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["email"]) && isset($_POST["post"]) && isset($_FILES["imgEmployee"]) && access1()){
                    addEmployee($_POST["name"], $_POST["firstname"], $_POST["email"], $_POST["post"], $_FILES);
                    header("Location: index.php?action=employees");
                    exit();
                }
                $dir = seeEmployees("Direction");
                $sup = seeEmployees("Cadre supérieur de santé");
                $med = seeEmployees("Médecin");
                $sag = seeEmployees("Sage-femme");
                $cad = seeEmployees("Cadre de santé");
                $inf = seeEmployees("Infirmier");
                $aid = seeEmployees("Aide-soignant");
                $bra = seeEmployees("Brancardier");
                require_once "view/frontend/employees.php";
                unset($_SESSION["error"]);
                unset($_SESSION["success"]);
                exit();
            }
            //PAGE PATIENTS
            if ($_GET["action"] == "patients") {
                //AJOUT DE PATIENT
                if(isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["disease"]) && access2()){
                    addPatient($_POST["name"], $_POST["firstname"], $_POST["disease"]);
                    header("Location: index.php?action=patients");
                    exit();
                }
                //RECHERCHE D'UN PATIENT
                if(isset($_POST["search"])){
                    $patients = searchPatients($_POST["search"]);
                    require_once "view/frontend/patients.php";
                    unset($_SESSION["error"]);
                    unset($_SESSION["success"]);
                    exit();
                }else{
                    $patients = seePatients();
                    require_once "view/frontend/patients.php";
                    unset($_SESSION["error"]);
                    unset($_SESSION["success"]);
                    exit();
                }
            }
            //PAGE SALONS
            if ($_GET["action"] == "channels") {
                //AJOUT SALON
                if(isset($_POST["name"]) && isset($_POST["description"]) && access4()){
                    addChannel($_POST["name"], $_POST["description"]);
                    header("Location: index.php?action=channels#channelsGroup");
                    exit();
                }
                //SUPPRESSION
                if (isset($_GET["channel"]) == "deleteChannel" && access4()){
                    deleteChannel($_GET["id_channel"]);
                    header("Location: index.php?action=channels#channelsGroup");
                    exit();
                }
                $channels = seeChannels();
                require_once "view/frontend/channels.php";
                unset($_SESSION["success"]);
                exit();
            }
            //PAGE CHAT
            if ($_GET["action"] == "channel") {
                //AJOUT CHAT
                if(isset($_POST["message"])){
                    addMessage($_POST["message"], $_SESSION["id_account"], $_GET["id_channel"]);
                    header("Location: index.php?action=channel&id_channel=".$_GET["id_channel"]);
                    exit();
                }
                //SUPPRESSION
                if (isset($_GET["channel"]) == "deleteMessage" && access4()){
                    deleteMessage($_GET["id_message"]);
                    header("Location: index.php?action=channel&id_channel=".$_GET["id_channel"]);
                    exit();
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
                    exit();
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
            require_once "view/frontend/error.php";
            //exit();
        }
        //DECONNEXION
        if ($_GET["action"] == "logout") {
            logout();
            header("Location: index.php");
            exit();
        }

        //************** CONNEXION ADMIN TEMPORAIRE **************
        if ($_GET["action"] == "loginAdmin") {
            loginAdmin();
            header("Location: index.php?action=home");
            exit();
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