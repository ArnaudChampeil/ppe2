<?php
require_once "model/Manager.php";

class DisplayManager{
    private $manager;

    function __construct(){
        $this->manager = new Manager;
    }

    public function setDisplayArticle($idArticle, $idImage){
        $db = $this->manager->connectDb();
        $image = $db->prepare("INSERT INTO display SET id_article = ?, id_image = ?");
        $image->execute(array($idArticle, $idImage));
    }

    public function setDisplayAccount($idAccount, $idImage){
        $db = $this->manager->connectDb();
        $image = $db->prepare("INSERT INTO display SET id_account = ?, id_image = ?");
        $image->execute(array($idAccount, $idImage));
    }
}