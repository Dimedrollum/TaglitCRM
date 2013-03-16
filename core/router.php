<?php
//this file describes router class. The main purpose of Router is to identify //
//what controller should be started 
//Next this data will be sent to dispatcher

//Class definition
class Router
{
    //the following vars will be sent to dispatcher
    
    public function process ($path, $params)
    {
        //requesting pathParsing
        $processResult = $this -> pathParse($path);
        if (!empty($params)){
            $processResult['params']=$params;
        }
        return $processResult;
    }
    private function pathParse ($path)
    {
               
        // next step parses the $path to route containg "controller", "action" 
        // and a posible error
        $route= explode('/', $path);
        
            
        //identifying the "controller" and "action"
        //chekisng if wrong URL submitted
        if (!empty($route[2])){
            die ("Error 404 <br> Requested link " . SITE_ROOT . $path . " does not exist!" );
        }
        else{
            //checking the provided controller. If it's not provided 
            //than controller is index
            if (empty($route[0])){
                $controller = "index";
                $action = "index";                
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
