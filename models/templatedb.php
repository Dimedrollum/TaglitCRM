<?php

//this PHP will be alled by controller. It is assumed that it contains logics of
//getting appropriate news

class TemplateDBModel
{
    //this attribure will contain c
    protected $dbLink;

   
    //connect db using MySQLi
    public function __construct()
    {
        $this->dbLink = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    }
    public function returnData($params)
    {
       if (!$this->dbLink){
            return null;
       }
       //getting vars
       $name = $this->dbLink->query("SELECT * FROM  `template` WHERE  `Key` LIKE  'Name'",MYSQLI_USE_RESULT);
       var_dump($name);
       return array ('params'=>"these".print_r($params,true), 'name'=>'Dll', 'age'=>28);
    }
}