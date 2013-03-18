<?php

//this is a dispatcher which will sends requests to appropriate MVC as long as 
//any additional blocks required

class Dispatcher
{
    
    protected $controllerClass;
    protected $controllerAction;
    protected $actionParams;
    protected $blocksRequired;
    

    public function __construct($dispatchRequest) 
    {
        
        $this->controllerClass = $dispatchRequest['class'];
        $this->controllerAction =$dispatchRequest['action'];
        $this->actionParams = $dispatchRequest['params'];
        $this->blocksRequired= array ('header','side','footer');
      
    }

    public function build()
    {
        //test
        
        print "bulid menthod is initiated<br>";
        print_r($this->controllerClass);
        $controller = new $this->controllerClass;
        print_r($controller);
        
    }
};