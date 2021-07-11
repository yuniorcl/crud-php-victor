<?php

require("../../config.php");
require '../core/autoload.php';
if (!empty($_POST)) {
    if (isset($_POST["name"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["phone"])) {
        if ($_POST["name"] != "" && $_POST["lastname"] != "" && $_POST["address"] != "") {
            $employee = new Employee();
            $employee->setName($_POST["name"]);
            $employee->setLastName($_POST["lastname"]);
            $employee->setAddress($_POST["address"]);
            $employee->setPhone($_POST["phone"]);
            $employee->setEmail($_POST["email"]);
            $employee->add();
        }
    }
}
