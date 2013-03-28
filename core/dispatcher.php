<?php

/**
 * this is a dispatcher which will sends requests to appropriate MVC as long as 
 *any additional blocks required
 */
class Dispatcher
{
    //at this point i declare all class atributes
    protected $controllerClass;
    protected $controllerAction;
    protected $actionParams;
    protected $blocksRequired=array ('header','menu','footer','links');
    
    /**
     * Defines the Dispatcher calss attributes
     * 
     * @param array $dispatchRequest - the parsed Request data (class, action, params)
     */
    public function __construct($dispatchRequest) 
    {
        
        $this->controllerClass = $dispatchRequest['class'];
        $this->controllerAction =$dispatchRequest['action'];
        $this->actionParams = $dispatchRequest['params'];
      
    }

    /**
     * this is a main method which is called from App. The main purpose is
     * to send request to Main and Blocks and collect the return array
     * 
     * @return array - the full data fetched from MVC and blocks
     */
    public function build()
    {
        //here we get the values of main by initiating getMainData method.
        $buildContent['main']= $this->getMainData();
        
        //initiating blocs and writing result to relevant content cells
        $buildContent['blocks']=$this->getBlocks();
        //returning array
        
        return $buildContent;
            }
            
    /**
     * Invoke MVC and return view data
     * 
     * @return string - Main View data from MVC
     */
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
                    new ErrorHandlerLib("Wrong action was requested");
                    die();
                }
            }
            else{
                //return if wrong controller
                new ErrorHandlerLib("Wrong controller was requested");
                    die();
            }
            
        }
    /**
     * invoke Block Loader an get all blocks HTMLs
     * 
     * @return array - Array with Strings containing all Blocks HTMLs
     */
    private function getBlocks()
    {
         foreach ($this->blocksRequired as $blockName) {
             
             //getting all blocks
             $block[$blockName] = new IndexBlock($blockName);
             $blocksArray[$blockName] = $block[$blockName]->returnContent();
             
             
        }  
        return $blocksArray;
    }
};