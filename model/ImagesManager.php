<?php
require_once "model/Manager.php";

class ImagesManager{
    private $manager;

    function __construct(){
        $this->manager = new Manager;
    }

    //Relation N,N
    public function setImageReturnId($extension){
        $db = $this->manager->connectDb();
        $image = $db->prepare("INSERT INTO images SET extension = ?");
        $image->execute(array($extension));

        return $db->lastInsertId();
    }

    public function getImage($id_article){
        $db = $this->manager->connectDb();
        $image = $db->query("SELECT extension FROM images WHERE id_image = ?");
        $image->execute(array($id_article));

        return $image;
    }
}