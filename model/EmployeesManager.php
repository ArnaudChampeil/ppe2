<?php
require_once "model/Manager.php";

class EmployeesManager extends AccountsManager{

    public function getEmployees(){
        $db = $this->manager->connectDb();
        $employees = $db->query("SELECT * FROM employees");

        return $employees;
    }
}