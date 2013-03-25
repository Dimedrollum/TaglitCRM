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
            new ErrorHandlerLib("DB is not conncted");
                    die();
       }
       //getting vars
       $name = mysqli_fetch_assoc($this->dbLink->query("SELECT * FROM  `template` WHERE  `Key` LIKE  'Name'",MYSQLI_USE_RESULT));
       $age = mysqli_fetch_assoc($this->dbLink->query("SELECT * FROM  `template` WHERE  `Key` LIKE  'Age'",MYSQLI_USE_RESULT));

       return array ('params'=>"these".print_r($params,true), 'name'=>$name['Value'], 'age'=>$age['Value']);
    }
}