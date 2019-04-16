<?php
require_once "model/ArticlesManager.php";
require_once "model/DisplayManager.php";
require_once "model/ImagesManager.php";
require_once "model/AccountsManager.php";
require_once "model/EmployeesManager.php";
require_once "model/PatientsManager.php";
require_once "model/ChannelsManager.php";
require_once "model/MessagesManager.php";

function navbarEmployees(){
    if(isset($_SESSION['id_account'])){
        require_once "view/frontend/navbarE.php";
    }
}
function navbarPatitents(){
    if(isset($_SESSION['id_patient'])){
        require_once "view/frontend/navbarP.php";
    }
}
function loginEmployee(){
    $_SESSION['id_account'] = 1;
}
function loginPatientA(){
    $_SESSION['id_patient'] = 1;
}
function logout(){
    session_destroy();
}

function randomString($size)
{
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($size/strlen($x)) )),1,$size);
}

//ARTICLES
    function seeArticles(){
        $articles = new ArticlesManager();
        return $articles->getArticles();
    }
    function seeArticle($id){
        $article = new ArticlesManager();
        return $article->getArticle($id);
    }
    function see5Articles(){
        $articles = new ArticlesManager();
        return $articles->get5Articles();
    }
    function addArticle($title, $content, $link, $id_account, $files){
        $title = htmlspecialchars($title);
        $content = nl2br(htmlspecialchars($content));
        $link = htmlspecialchars($link);

        $article = new ArticlesManager();
        //Retourne l'id de l'article pour l'imagede l'article
        $idArticle = $article->setArticleReturnId($title, $content, $link, $id_account);

        //Récupère le nom du fichier
        $file_name = $files["imgArticle"]["name"];
        //Récupère l'extension du fichier
        $file_extension = strrchr($file_name, '.');
        //Déplace le fichier du dossier temporaire au serveur
        $file_tmp_name = $_FILES["imgArticle"]["tmp_name"];
        $file_dest = "public/img/articles/imgArticle".$idArticle.$file_extension;
        //Tableau des extension autorisée
        $extension_autorisees = array(".png", ".PNG", ".jpg", ".JPG", ".jpeg", ".JPEG", ".gif", ".GIF");

        //Insertion de l'extension de l'image et retourne l'id de l'entrée
        $image = new ImagesManager();
        $idImage = $image->setImageReturnId($file_extension);

        //Insertion des ID de l'article et de l'image dans la table Display(relation N,N)
        $display = new DisplayManager();
        $display->setDisplay($idArticle, $idImage);

        if (in_array($file_extension, $extension_autorisees)){
            move_uploaded_file($file_tmp_name, $file_dest);
            $_SESSION["flash"]["succes"] = "Article posté avec succès !"; //NON FONCTIONNELLE
        }else{
            $_SESSION["flash"]["error"] = "L'image ne s'est pas téléchargé."; //NON FONCTIONNELLE
        }
    }
    function editArticle($title, $content, $link, $id_article){
        $title = htmlspecialchars($title);
        $content = nl2br(htmlspecialchars($content));
        $link = htmlspecialchars($link);

        $article = new ArticlesManager();
        $article->setUpdateArticle($title, $content, $link, $id_article);
    }
    function deleteArticle($id_article){
        $article = new ArticlesManager();
        $article->unsetArticle($id_article);
    }

//EMPLOYES
   function addEmployee($name, $firstname, $email, $post){
       $name = htmlspecialchars($name);
       $firstname = htmlspecialchars($firstname);
       $email = htmlspecialchars($email);
       $post = htmlspecialchars($post);

       //CREER UN ALGO QUI CHOISI UN NIVEAU D'ACCES EN FONCTION DU POSTE DE L'EMPLOYE

       $employee = new EmployeesManager();
       $employee->setEmployee($name, $firstname, $email, $post, $access);
   }


//PATIENTS
    function addPatient($name, $firstname, $disease){
        $name = htmlspecialchars($name);
        $firstname = htmlspecialchars($firstname);
        $disease = htmlspecialchars($disease);

        $patient = new PatientsManager();
        $login = randomString(10);
        $loginPatient = $patient->getLogin($login);

        while($loginPatient->fetch() != false){
            $login = randomString(10);
        }

        $patient->setPatient($name, $firstname, $login, $disease);
    }
    function seePatients(){// NE PREND LES INFORMATIONS QUE DE GETPATIENTS
        $patients = new PatientsManager();
        $patient = $patients->getPatients();
        return $patient;
    }
    function searchPatients($search){
        $search = htmlspecialchars($search);

        $patients = new PatientsManager();
        $patient = $patients->getSearchPatients($search);
        return $patient;
    }

    function verifyLoginPatient($login, $password){
        $patient = new PatientsManager();
        $data = $patient->verifyPatient($login);

        /*
        if(isset($data["login"]) && password_verify($password, $data["password"]) && $password = $data["name"] ){

            return $login = true;

        }else */

        if(isset($data["login"]) && password_verify($password, $data["password"])){
            return true;
        }
        else{
            return false;
        }
    }
    function loginPatient($login){
        $patient = new PatientsManager();
        $data = $patient->getPatientLogin($login);

        $_SESSION["id_account"] = $data["id_account"];
        $_SESSION["name"] = $data["name"];
        $_SESSION["firstName"] = $data["firstName"];
        $_SESSION["id_patient"] = $data["id_patient"];
        $_SESSION["login"] = $data["login"];
        $_SESSION["creationDate"] = $data["creationDate"];

        // ECRITURES DES COOKIES POUR LES PROCHAINES CONNEXIONS
        setcookie('login', $_POST['login'], time() + 365*24*3600, null, null, false, true);
        setcookie('password', $_POST['passwordP'], time() + 365*24*3600, null, null, false, true);
    }

// CHANNELS
    function seeChannels(){
        $channels = new ChannelsManager();
        return $channels->getChannels();
    }
    function addChannel($name, $description){
        $name = htmlspecialchars($name);
        $description = htmlspecialchars($description);

        $channel = new ChannelsManager();
        $channel->setChannel($name, $description);
    }

//TCHAT
    function seeMessages($id){
        $messages = new MessagesManager();
        return $messages->getMessages($id);
    }
    function addMessage($content, $id_account, $id_channel){
        $content = htmlspecialchars($content);

        $message = new MessagesManager();
        return $message->setMessage($content, $id_account, $id_channel);
    }

//PARAMETRES
    function seeSettings($id){
        $patient = new PatientsManager();
        return $patient->getPatient($id);
    }
    function updateSettings($password, $email, $id){
        $password = htmlspecialchars($password);
        $email = htmlspecialchars($email);

        $passHash = password_hash($password, PASSWORD_DEFAULT);

        $patient = new PatientsManager();
        $patient->setUpdatePatient($passHash, $email, $id);
    }