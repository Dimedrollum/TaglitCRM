<?php

//the definitions below will be availible across whole app
//this is definition of server
// define is a way to create a var
define('SERVER_ROOT','/var/www/TaglitCRM');

//definition of website. In local case it is localhost
define('SITE_ROOT','localhost'); 

//send data to router
require_once(SERVER_ROOT.'/controllers/'.'router.php');

?>
