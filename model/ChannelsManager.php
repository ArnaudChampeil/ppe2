<?php
require_once "model/Manager.php";

class ChannelsManager{
    private $manager;

    public function __construct(){
        $this->manager =  new Manager;
    }

    public function getChannels(){
        $db = $this->manager->connectDb();
        $channels = $db->query("SELECT * FROM channels GROUP BY dateCreation DESC");

        return $channels;
    }

    public function setChannel($name, $description){
        $db = $this->manager->connectDb();
        $article = $db->prepare("INSERT INTO channels(name, description, dateCreation) VALUES(:name, :description, NOW())");

        $article->execute(array(
            "name" => $name,
            "description" => $description
        ));
    }
}