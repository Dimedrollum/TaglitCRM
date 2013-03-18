<?php

//this is a dispatcher which will sends requests to appropriate MVC as long as 
//any additional blocks required

class Dispatcher
{
    //at this point i declare all class atributes
    protected $controllerClass;
    protected $controllerAction;
    protected $actionParams;
    protected $blocksRequired;
    
    //next part initiated the class atributes from input
    public function __construct($dispatchRequest) 
    {
        
        $this->controllerClass = $dispatchRequest['class'];
        $this->controllerAction =$dispatchRequest['action'];
        $this->actionParams = $dispatchRequest['params'];
        $this->blocksRequired= array ('header','nav','footer');
      
    }
    
    public function build()
    {
        //initiating MVC and writing result to a relevant Content cell
        $controller = new $this->controllerClass;
        $Content['main']=$controller-> {$this->controllerAction}($this->actionParams);
        
        //initiating blocs and writing result to relevant content cells
        foreach ($this->blocksRequired as $blockName) {
            $block[$blockName]= new $blockName;
            $Content[$blockName]= $block[$blockName]->returnContent();
        }
        
        //returning array
        
        return $Content;
        
        
    }
};