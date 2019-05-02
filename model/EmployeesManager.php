<?php
require_once "model/Manager.php";

class EmployeesManager extends AccountsManager{

    public function getEmployees($post){
        $db = $this->manager->connectDb();
        $employees = $db->prepare("SELECT a.name, a.firstname FROM accounts a INNER JOIN employees e ON a.id_account = e.id_account WHERE e.post = ? GROUP BY a.id_account DESC");
        $employees->execute(array($post));

        return $employees;
    }
    public function getEmployee($id){
        $db = $this->manager->connectDb();
        $employee = $db->prepare("SELECT a.id_account, a.name, a.firstname, a.email, a.password, a.nbMessages, e.post FROM accounts a INNER JOIN employees e ON a.id_account = e.id_account WHERE a.id_account = ?");
        $employee->execute(array($id));

        return $employee->fetch(PDO::FETCH_ASSOC);
    }

    public function setEmployee($name, $firstname, $email, $password, $post, $access){
        $db = $this->manager->connectDb();
        $employee = $db->prepare("INSERT INTO accounts SET name = ?, firstname = ?, email = ?, password = ?, nbMessages = ?");
        $employee->execute(array($name, $firstname, $email, $password, 0));

        $id = $db->lastInsertId();

        $employee2 = $db->prepare("INSERT INTO employees SET id_account = ?, post = ?, access = ?");
        $employee2->execute(array($id, $post, $access));
    }

    public function verifyEmployee($email){
        $db = $this->manager->connectDb();
        $employee = $db->prepare("SELECT a.email, a.password FROM accounts a INNER JOIN employees e ON a.id_account = e.id_account WHERE email = ?");
        $employee->execute(array($email));

        return $employee->fetch(PDO::FETCH_ASSOC);
    }

    public function getEmployeeEmail($email){
        $db = $this->manager->connectDb();
        $employee = $db->prepare("SELECT a.id_account, a.name, a.firstname, e.post, e.access FROM accounts a INNER JOIN  employees e ON a.id_account = e.id_account WHERE email = ?");
        $employee->execute(array($email));

        return $employee->fetch(PDO::FETCH_ASSOC);
    }
}