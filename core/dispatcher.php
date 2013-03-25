<?php

//this is a dispatcher which will sends requests to appropriate MVC as long as 
//any additional blocks required

class Dispatcher
{
    //at this point i declare all class atributes
    protected $controllerClass;
    protected $controllerAction;
    protected $actionParams;
    protected $blocksRequired=array ('header','menu','footer','links');
    
    //next part initiated the class atributes from input
    public function __construct($dispatchRequest) 
    {
        
        $this->controllerClass = $dispatchRequest['class'];
        $this->controllerAction =$dispatchRequest['action'];
        $this->actionParams = $dispatchRequest['params'];
      
    }
    //this is a main method which is called from App. The main purpose is
    //to send request to Main and Blocks and collect the return array
    public function build()
    {
        //here we get the values of main by initiating getMainData method.
        $buildContent['main']= $this->getMainData();
        
        //initiating blocs and writing result to relevant content cells
        $buildContent['blocks']=$this->getBlocks();
        //returning array
        
        return $buildContent;
            }
            
    //this function check whether correct data is requested and returns the Main
    // data
    private function getMainData()
        {
            //check if controller exists
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
        // this function is to call all blocks and get data from them.
    private function getBlocks()
    {
         foreach ($this->blocksRequired as $blockName) {
//             $blockClassName = ucfirst($blockName) . "Block";
//             if (class_exists($blockClassName)){
//                 $block[$blockName]= new $blockClassName;
//                 $blocksArray[$blockName]= $block[$blockName]->returnContent();            
//             }
//             else{
//                 $blocksArray[$blockName]="Error: Block class is not found";
//             }
             $block[$blockName] = new BlockLoaderLib($blockName);
             $blocksArray[$blockName] = $block[$blockName]->returnContent();
             
             
        }  
        return $blocksArray;
    }
};