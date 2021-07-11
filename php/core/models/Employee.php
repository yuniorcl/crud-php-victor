<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 */
class Employee extends DataRow {

    public static $tablename = "mp_employee";
    private $id;
    private $name;
    private $lastname;
    private $address;
    private $phone;
    private $email;
    private $createdat;

    public function __construct() {
        $this->id = "";
        $this->name = "";
        $this->lastname = "";
        $this->address = "";
        $this->phone = "";
        $this->email = "";
        $this->created_at = "NOW()";
    }

    public function add() {
        $sql = "insert into " . self::$tablename . " (name,lastname,address,phone,email,created_at) ";
        $sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->address\",\"$this->phone\",\"$this->email\", $this->created_at)";
        var_dump($sql);
        Executor::doit($sql);
    }

    public static function delById($id) {
        $sql = "delete from " . self::$tablename . " where id=$id";
        Executor::doit($sql);
    }

    public function del() {
        $sql = "delete from " . self::$tablename . " where id=$this->id";
        Executor::doit($sql);
    }

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
    public function update() {
        $sql = "update " . self::$tablename . " set name=\"$this->name\",lastname=\"$this->lastname\",address=\"$this->address\",phone=\"$this->phone\",email=\"$this->email\" where id=$this->id";
        Executor::doit($sql);
    }

    public static function getById($id) {
        $sql = "select * from " . self::$tablename . " where id=$id";
        $query = Executor::doit($sql);       
        return Model::one($query[0], new Employee());
    }

    public static function getAll() {
        $sql = "select * from " . self::$tablename . " order by created_at desc";
        $query = Executor::doit($sql);
        return Model::many($query[0], new Employee());
    }

    public static function getLike($q) {
        $sql = "select * from " . self::$tablename . " where name like '%$q%' or lastname like '%$q%'  or address like'%$q%' or email like '%$q%' or phone like'%$q%'";
        $query = Executor::doit($sql);
        return Model::many($query[0], new Employee());
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastName() {
        return $this->lastname;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCreatedat() {
        return $this->createdat;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setLastName($lastname) {
        $this->lastname = $lastname;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setCreatedat($createdat) {
        $this->createdat = $createdat;
    }
    
     public function getDataToDatarow($row) {
         $employee = new Employee();
         $employee->setName($row["name"]);
         $employee->setLastName($row["lastname"]);
         $employee->setAddress($row["address"]);
         $employee->setPhone($row["phone"]);
         $employee->setEmail($row["email"]);
         $employee->setId($row["id"]);
         $employee->setCreatedat($row["created_at"]);
         return $employee;
    }
}
