<?php
require_once "model/Manager.php";

class AccountsManager{
    protected $manager;

    function __construct(){
        $this->manager = new Manager;
    }

    public function getAccounts(){
        $db = $this->manager->connectDb();
        $account = $db->query("SELECT * FROM accounts");

        return $account;
    }

    public function setAccount($name, $firstname, $email, $password){
        $db = $this->manager->connectDb();
        $article = $db->prepare("INSERT INTO accounts(name, firstname, email, password, nbMessages) VALUES(:name, :firstname, :email, :password, :nbMessages)");

        $article->execute(array(
            "name" => $name,
            "firstname" => $firstname,
            "email" => $email,
            "password" => $password,
            "nbMessages" => 0
        ));
    }

    public function setAccountP($name, $firstname){
        $db = $this->manager->connectDb();
        $article = $db->prepare("INSERT INTO accounts(name, firstname, email, nbMessages) VALUES(:name, :firstname, :email, :nbMessages)");

        $article->execute(array(
            "name" => $name,
            "firstname" => $firstname,
            "email" => "Non renseigné",
            "nbMessages" => 0
        ));
    }
}