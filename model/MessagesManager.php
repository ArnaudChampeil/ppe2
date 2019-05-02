<?php
require_once "model/Manager.php";

class MessagesManager{
    private $manager;

    public function __construct(){
        $this->manager =  new Manager;
    }

    public function getAllMessages(){
        $db = $this->manager->connectDb();
        $messages = $db->query("SELECT * FROM messages GROUP BY dateCreation DESC");

        return $messages;
    }
    public function getMessages($id){
        $db = $this->manager->connectDb();
        $messages = $db->prepare("SELECT a.firstname, m.dateCreation, m.content, m.id_message, m.id_account FROM accounts a, messages m WHERE a.id_account = m.id_account  AND m.id_channel = ? GROUP BY m.dateCreation");
        $messages->execute(array($id));

        return $messages;
    }

    public function setMessage($content, $id_account, $id_channel){
        $db = $this->manager->connectDb();
        $message = $db->prepare("INSERT INTO messages SET content = ?, dateCreation = NOW(), id_account = ?, id_channel = ?");
        $message->execute(array($content, $id_account, $id_channel));
        //INCREMENTATION DU NBMESSAGES DE 1
        $req = $db->prepare("SELECT nbMessages FROM accounts WHERE id_account = ?");
        $req->execute(array($id_account));
        $nbM = $req->fetch();
        $nbM["nbMessages"]++;

        $message2 = $db->prepare("UPDATE accounts SET nbMessages = ? WHERE id_account = ?");
        $message2->execute(array($nbM["nbMessages"], $id_account));
    }
    public function unsetMessage($id){
        $db = $this->manager->connectDb();
        $message = $db->prepare("DELETE FROM messages WHERE id_message = ?");
        $message->execute(array($id));
    }
}