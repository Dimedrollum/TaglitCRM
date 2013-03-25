<?php

//this lib is created for creating error objects
class ErrorHandlerLib
{
    private $errorPath;


    public function __construct($errorMessage) 
    {
        //settin up the HTML place
        $this->errorPath = SERVER_ROOT. "/templates/404.php";
        
        //gettign error message
        include $this->errorPath;
    }
}
