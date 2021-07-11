<?php
require("../../config.php");
require '../core/autoload.php';
if (!empty($_GET)) {
    $emloyee = Employee::delById($_GET["id"]);   
    if ($emloyee != null) {
        print "<script>alert(\"Eliminado exitosamente.\");window.location='../ver.php';</script>";
    } else {
        print "<script>alert(\"No se pudo eliminar.\");window.location='../ver.php';</script>";
    }
}

