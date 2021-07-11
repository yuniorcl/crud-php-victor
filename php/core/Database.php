<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 */
class Database {

    public static $db;
    public static $con;

    function Database() {        
    }

    function connect() {
        return new mysqli(DB_HOST, DB_HOST_USERNAME, DB_HOST_PASSWORD, DB_DATABASE);
    }

    public static function getCon() {
        if (self::$con == null && self::$db == null) {
            self::$db = new Database();
            self::$con = self::$db->connect();
        }
        return self::$con;
    }

}
