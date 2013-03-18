<?php
//This file will take News handling
print "file is connected";
class NewsController
{
    //next var will contain the link to a relevant View for this controller
    public $template = 'news';
    
    //creating a construct
    
    public function __construct()
    {
        print "construct";
    }

//the next function will be called by index.php
    //parraments are parced GET posted to index.php
    public function listAction (array $getVars)
    {
        //TEST!!!!
        //this is a test , and we will be removing it later
        print "We are in news!";
        print '<br/>';
        $vars = print_r($getVars, TRUE);
        print ("The following GET vars were passed to this controller:" .
            "<pre>".$vars."</pre>");
        //END OF TEST!!!!
        
        //this is an injection of model
        print 'Lable before class initiation!';//test string
        $newsModel = new News_Model;
        
        //testing that the model is included
        print 'this is an initiated model '.print_r($newsModel, true);
    }
}
