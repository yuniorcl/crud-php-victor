<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 */
class Model {

    public static function exists($modelname) {
        $fullpath = self::getFullpath($modelname);
        $found = false;
        if (file_exists($fullpath)) {
            $found = true;
        }
        return $found;
    }

    public static function getFullpath($modelname) {
        return "php/core/models/" . $modelname . ".php";
    }

    public static function many($query, $aclass) {
        $cnt = 0;
        $array = array();
        if (!empty($query)) {
            while ($r = $query->fetch_array()) {
                $array[$cnt] = $aclass->getDataToDatarow($r);               
                $cnt++;
            }
        }
        return $array;
    }

    //////////////////////////////////
    public static function one($query, $aclass) {
        $cnt = 0;
        $found = null;
        $data = new $aclass;
        while ($r = $query->fetch_array()) {
            $cnt = 1;
            foreach ($r as $key => $v) {
                if ($cnt > 0 && $cnt % 2 == 0) {
                     $data  = $aclass->getDataToDatarow($r);  
                     break;
                }
                $cnt++;
            }

            $found = $data;
            break;
        }
        return $found;
    }
    
   

}
