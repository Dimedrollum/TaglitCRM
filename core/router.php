<?php
//this file describes router class. The main purpose of Router is to identify //
//what controller should be started 
//Next this data will be sent to dispatcher

//Class definition
class Router
{   
    /**
     * Router class defines which controller is to be invoked
     */
    public function __construct() {
           ;
    }
    
    /**
     * Processes the path and parmas to define Controller and Action to invoke
     * 
     * @param string $path - "controler/action" sent in request
     * @param array $params - the _GET params
     * @return array - separated controller/action/params array
     */
    public function process ($path, $params)
    {
        //requesting pathParsing
        $processResult = $this -> pathParse($path);
        $processResult['params']=$params;
        return $processResult;
    }
    /**
     * Internal method. Parces path
     * 
     * @param string $path - "controler/action" sent in request
     * @return array - controller/action array
     */
    private function pathParse ($path)
    {
               
        // next step parses the $path to route containg "controller", "action" 
        // and a posible error
        $route= explode('/', $path);
        
            
        //identifying the "controller" and "action"
        //chekisng if wrong URL submitted
        if (!empty($route[2])){
            
            new ErrorHandlerLib("Requested link " . SITE_ROOT . $path . " does not exist!");
                    die();
        }
        else{
            //checking the provided controller. If it's not provided 
            //than controller is index
            if (empty($route[0])){
                $controller = "index";
                $action = "index"."Action";                
            }
            else{
            $controller = strtolower($route[0]);
                //checking provoided action
                if(empty($route[1])){
                    $action = "index"."Action";
                }
                else{
                    $action = strtolower($route[1]) . "Action";
                }
            }
        };
        //creating allso a var for class
        $class = ucfirst($controller) . "Controller";
              
        //adding all necessary vars to an array
        return compact('class', 'action');
    }

};
