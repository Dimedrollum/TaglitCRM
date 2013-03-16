<?php

//the definitions below will be availible across whole app
//this is definition of server
// define is a way to create a var
// __DIR__ - Directory where current file is found
define('SERVER_ROOT', __DIR__);

//definition of website. In local case it is localhost
define('SITE_ROOT', 'http://localhost/'); 

//send data to router
require_once(SERVER_ROOT.'/core/'.'app.php');

$app = new App();
$app->run();
