<?php
require_once "model/Manager.php";

class EmployeesManager extends AccountsManager{

    public function getEmployees($post){
        $db = $this->manager->connectDb();
        $employees = $db->prepare("SELECT a.name, a.firstname FROM accounts a INNER JOIN employees e ON a.id_account = e.id_account WHERE e.post = ? GROUP BY a.id_account DESC");
        $employees->execute(array($post));

        return $employees;
    }

    public function setEmployee($name, $firstname, $email, $post, $access){
        $db = $this->manager->connectDb();
        $employee = $db->prepare("INSERT INTO accounts SET name = ?, firstname = ?, email = ?, password = ?, nbMessages = ?");
        $employee->execute(array($name, $firstname, $email, $name, 0));

        $id = $db->lastInsertId();

        $employee2 = $db->prepare("INSERT INTO employees SET id_account = ?, post = ?, access = ?");
        $employee2->execute(array($id, $post, $access));
    }
}