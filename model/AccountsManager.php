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

    public function setUpdateAccount($password, $email, $id){
        $db = $this->manager->connectDb();
        $patient = $db->prepare("UPDATE accounts a SET a.password = ?, a.email = ? WHERE a.id_account = ?");
        $patient->execute(array($password, $email, $id));
    }
}