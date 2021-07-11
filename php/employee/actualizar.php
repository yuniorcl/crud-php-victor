<?php

require("../../config.php");
require '../core/autoload.php';

if (!empty($_POST)) {
    if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["phone"])) {
        if ($_POST["id"] != "" && $_POST["name"] != "" && $_POST["lastname"] != "" && $_POST["address"] != "") {

            $employee = Employee::getById($_POST["id"]);

            if ($employee != null) {
                $employee->setName($_POST["name"]);
                $employee->setLastName($_POST["lastname"]);
                $employee->setAddress($_POST["address"]);
                $employee->setPhone($_POST["phone"]);
                $employee->setEmail($_POST["email"]);
                $query = $employee->update();
                if ($query != null) {
                    print "<script>alert(\"Actualizado exitosamente.\");window.location='../ver.php';</script>";
                } else {
                    print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";
                }
            } else {
                print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";
            }
        }
    }
}
