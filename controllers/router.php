<?php
// this file will route all requests from index to different controllers

//get the string request passed from index (everithing following "?"
$request= $_SERVER['QUERY_STRING'];

//now we need to parse the request
// explode() creates array by splitting string using a spliter ('&')
$parced = explode('&', $request);

//take the first element of $request array (which is PAGE)
$page= array_shift($parced);

// next values in array are _GET statements

//arsing out the get sataements
$getVars=array();
foreach ($parced as $argument){
    //split the GET to separate arguments and values. "=" is separator
    list($variable, $value) = split('=', $argument); //list is used to make 2 values in one time
    $getVars[$variable]=$value;
}

//TESTING!!!
//this code is used for testing the Router only
print 'The page you\'ve requested is '.$page;
print '<br>';
$vars = print_r($getVars,TRUE);
print "The following GET vars were passed to the page:<pre>".$vars."</pre>";
//END OF TESTING!!!!

//create the path to file
$target = SERVER_ROOT."/controllers/".$page.'.php';

// inlude the TARGET code to this PHP file
if (file_exists($target))
{
    include_once($target);
    
    //Add appropriate appendics to meet Class naming convention
    $class=  ucfirst($page).'_Controller';
    
    //Initiate the relevant class
    if (class_exists($class))
    {
        $controller = new $class;
    }
    else
    {
        //this is a check if our class is named correctly
        die('class '.$class.' does not exist');
    }
}
else
{
    //there is no such file in controllers
    die('page does not exist');
}

//at this point we have the Controller included and class initiated
//now we need to pass the GET values to main funcion of initiated class
$controller->main($getVars);
?>
