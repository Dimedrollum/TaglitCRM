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
       //mysqli stmt
       
       //initialize STMT
       $stmt = $this->dbLink->stmt_init();
       
       //start getting results along with Error Handling
       if(      
               //preparing the string
               ($stmt->prepare("SELECT `value` FROM `template` WERE `key` = ?")===FALSE) or
               //ammending placeholder
               ($stmt->bind_param(s, 'Age')===FALSE) or
               //request prepared query execution
               ($stmt->execute()===FALSE) or
               //getting results
               (($result = $stmt->get_result())===FALSE) or
               //closing the request
               ($stmt->close()===FALSE)
               
               ){
           new ErrorHandlerLib("DB error $stmt->error");
       };
       
       $name= $result->fetch_assoc();

       return array ('params'=>"these".print_r($params,true), 'name'=>$name['Value'], 'age'=>'$age[\'Value\']');
    }   
}