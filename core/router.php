<?php
// this file will route all requests from index to different controllers

//the .htaccess was rewrited to write all data begore '?' to "q"
//following row takes the 'q' query to 'request'. the other thing will be handled in router
$request = $_GET['q'];

//now we need to parse the request
// explode() creates array by splitting string using a spliter ('/')
//(!) this record needs to be rewrited for better error handling
list ($controller, $action) = explode('/', $request);

//definition of action

//set action to 'index' as default if it is absent
if (empty($action)) {
    $action = 'index';
}

//add 'Action' appendix to meat naming of methods
$action = strtolower($action) . 'Action';

//build paramts by deleting 'q' part used above
$params = $_GET;
unset($params['q']);

//TESTING!!!
//this code is used for testing the Router only
print "The page you've requested is ($controller::$action)<br />";

$vars = print_r($params,TRUE);
print "The following GET vars were passed to the page:<pre>".$vars."</pre>";
//END OF TESTING!!!!

//create the path to file. ajusting cases to lower.
$target = SERVER_ROOT."/controllers/".strtolower($controller).'.php';

// inlude the TARGET code to this PHP file
if (file_exists($target))
{
    include_once($target);
    
    //Add appropriate appendics + ajust Case to meet Class naming convention.
    $class = ucfirst($controller).'Controller';
    
    //Initiate the relevant class instance
    if (class_exists($class))
    {
        $controllerInstance = new $class;
        
        //initiate action. check existance
        if (method_exists($controllerInstance, $action)) {
            //run action
            $controllerInstance->$action($params);    
        }
        //action error handling
        else {
            die ('Action '.$action.' not found');
        }
        
    }
    else
    {
        //class error handling
        die('class '.$class.' does not exist');
    }
}
else
{
    //File error handling. there is no such file in controllers
    die('page does not exist');
}

//at this point we have the Controller included and class initiated
//now we need to pass the GET values to main funcion of initiated class
