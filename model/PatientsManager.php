<?php
require_once "model/Manager.php";

class PatientsManager extends AccountsManager {

    public function getPatients(){
        $db = $this->manager->connectDb();
        $patients = $db->query("SELECT a.id_account, a.name, a.firstname, a.email, a.nbMessages, p.id_patient, p.disease, p.creationDate, p.login FROM accounts a, patients p WHERE a.id_account = p.id_account GROUP BY p.id_patient DESC");

        return $patients;
    }
    public function getPatient($id){
        $db = $this->manager->connectDb();
        $patient = $db->prepare("SELECT a.id_account, a.name, a.firstname, a.email, a.password, a.nbMessages, p.id_patient, p.login, p.disease, p.creationDate FROM accounts a INNER JOIN patients p ON a.id_account = p.id_account WHERE a.id_account = ?");
        $patient->execute(array($id));

        return $patient->fetch(PDO::FETCH_ASSOC);
    }
    public function getSearchPatients($x){ //$x = chaine de caractère a chercher
        $db = $this->manager->connectDb();
        $patients = $db->query("SELECT a.name, a.firstname, a.email, a.nbMessages, p.id_patient, p.disease, p.creationDate, p.login FROM accounts a INNER JOIN patients p ON a.id_account = p.id_account 
WHERE a.name LIKE '%$x%' OR a.firstname LIKE '%$x%' OR a.email LIKE '%$x%' OR p.id_patient LIKE '%$x%' OR p.disease LIKE '%$x%' OR p.creationDate LIKE '%$x%' OR p.login LIKE '%$x%' GROUP BY p.id_account");

        return $patients;
    }
    public function getLogin($login){
        $db = $this->manager->connectDb();
        $patient = $db->prepare("SELECT login FROM patients WHERE login = ?");
        $patient->execute(array($login));

        return $patient;
    }
    public function setPatient($name, $firstname, $login, $disease){
        $db = $this->manager->connectDb();

        $patient1 = $db->prepare("INSERT INTO accounts SET name = ?, firstname = ?, email = ?, password = ?, nbMessages = ?");
        $patient1->execute(array($name, $firstname, "Non renseigné", $name, 0));

        //Prendre l'id de la derniere entrée a account pour la mettre dans la table patient
        $id = $db->lastInsertId();
        $patient2 = $db->prepare("INSERT INTO patients SET id_account = ?, login = ?, disease = ?, creationDate = NOW()");
        $patient2->execute(array($id, $login, $disease));
    }
    public function setUpdatePatient($password, $email, $id){
        $db = $this->manager->connectDb();
        $patient = $db->prepare("UPDATE accounts a INNER JOIN patients p ON a.id_account = p.id_account SET a.password = ?, a.email = ? WHERE a.id_account = ?");
        $patient->execute(array($password, $email, $id));
    }


    public function verifyPatient($login){
         $db = $this->manager->connectDb();
         $patient = $db->prepare("SELECT p.login, a.password FROM accounts a INNER JOIN patients p ON a.id_account = p.id_account WHERE p.login = ?");
         $patient->execute(array($login));

        return $patient->fetch(PDO::FETCH_ASSOC);
    }
    public function getPatientLogin($login){
         $db = $this->manager->connectDb();
         $patient = $db->prepare("SELECT a.id_account, a.name, a.firstname, p.id_patient, p.login, p.creationDate FROM accounts a INNER JOIN patients p ON a.id_account =p.id_patient WHERE login = ?");
         $patient->execute(array($login));

        return $patient->fetch(PDO::FETCH_ASSOC);
    }
}