<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function debug($var): void{
        echo "<h4>DEBUG :</h4>";
        echo "<pre>";
        print_r($var);
        echo "</pre>";        
    }

    /*public function __get($attr){
        $method = 'get'.ucFirst($attr);
        return $this->$method();
    }

    public function __set($attr, $value){
        $method = 'set'.ucFirst($attr);
        echo "methode =".$method;
        return $this->$method($value);
    }*/
}