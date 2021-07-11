<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author yconcepcion
 */
class Page extends DataRow {

    public static $tablename = "mp_pages";
    private $id;
    private $title;
    private $desc;
    private $alias;

    public function __construct() {
        $this->id = "";
        $this->title = "";
        $this->desc = "";
        $this->alias = "";
    }

    public function getDataToDatarow($row) {
        $page = new Page();
        $page->setId($row["page_id"]);
        $page->setTitle($row["page_title"]);
        $page->setDesc($row["page_desc"]);
        $page->setAlias($row["page_alias"]);
        return $page;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
    }
    
     public static function getPageDetailsByName($currentPage) {
        $sql = "select * from " . self::$tablename . " where 1 AND page_alias=\"$currentPage\"";
        $query = Executor::doit($sql);        
        return Model::one($query[0], new Page());
    }
}
