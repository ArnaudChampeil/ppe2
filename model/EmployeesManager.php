<?php
require_once "model/Manager.php";

class EmployeesManager extends AccountsManager{

    public function getEmployees(){
        $db = $this->manager->connectDb();
        $employees = $db->query("SELECT * FROM employees");

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