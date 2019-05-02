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
        $channel = $db->prepare("INSERT INTO channels(name, description, dateCreation) VALUES(:name, :description, NOW())");

        $channel->execute(array(
            "name" => $name,
            "description" => $description
        ));
    }

    public function unsetChannel($id){
        $db = $this->manager->connectDb();
        $channel = $db->prepare("DELETE FROM channels WHERE id_channel = ?");
        $channel->execute(array($id));
    }
}