<?php
/**
 * The class handles all Errors by troing Error message
 */
class ErrorHandlerLib
{
    private $errorPath;

    /**
     * Generate Error messge and sispalye it to user
     * 
     * @param string $errorMessage - the message which is going to be displayed
     */
    public function __construct($errorMessage) 
    {
        //settin up the HTML place
        $this->errorPath = SERVER_ROOT. "/templates/404.php";
        
        //gettign error message
        include $this->errorPath;
    }
}
