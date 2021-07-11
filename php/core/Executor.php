<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Executor
 */
class Executor {
  public static function doit($sql){
		$con = Database::getCon();               
		return array($con->query($sql),$con->insert_id);
	}
}
