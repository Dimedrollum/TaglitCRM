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
        $this->blocksRequired= array ('header','nav','footer');//check layout before changing these values
      
    }
    //this is a main method which is called from App. The main purpose is
    //to send request to Main and Blocks and collect the return array
    public function build()
    {
        //here we get the values of main by initiating getMainData method.
        $buildContent['main']= $this->getMainData();
        
        //initiating blocs and writing result to relevant content cells
        
        //returning array
        
        return $buildContent;
            }
            
    //this function check whether correct data is requested and returns the Main
    // data
    private function getMainData()
        {
            //chek if controller exists
            if (class_exists($this->controllerClass)) {
                $controller = new $this->controllerClass;
                //check method existance
                if (method_exists($controller, $this->controllerAction)){
                    
                    //main return is here
                    return $controller-> {$this->controllerAction}($this->actionParams);
                }
                //return if wrong action
                else{
                    return 'Error: wrong action';
                }
            }
            else{
                //return if wrong controller
                return 'Error: wrong controller';
            }
            
        }
    private function getBlocs()
        {
         foreach ($this->blocksRequired as $blockName) {
            $block[$blockName]= new $blockName;
            $blocksArray[$blockName]= $block[$blockName]->returnContent();
        }           
        }
};