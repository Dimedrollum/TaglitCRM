<?php
// this is a test controller
//the controller class needs to initiate 

class IndexController
{
    //defining view that will be loaded
    protected $controllerName = "template";
    protected $viewHtml= "index";
    protected $viewObj;
    
    /**
     * This method invockes ViewLoader Class
     * 
     * @param array $modelReturn
     * @return string
     */
    private function invokeLoader ($modelReturn)
    {
        //here we are packind data
        //1st we initiate the Obj
         $this->viewObj=new ViewLoaderLib($this->viewHtml, $this->controllerName);
        
        //then we request the render
        $this->viewObj->packView($modelReturn);
        
        //and return final render
        return $this->viewObj->viewRender;
    }
    /**
     * this is a public testing Action to envoke a particular model
     * 
     * @param array $getVars - Keys=>Values from GET
     * @return string - this string contain HTML of generated view
     */
    public function listAction (array $getVars)
    {
        //here we initiate the model obj and request the data
        $newModel = new TemplateListModel;
        $modelReturn = $newModel->returnData($getVars);
        
        //at this point we request data to be packed to view and returned form controller
        return $this->invokeLoader($modelReturn);

    }
    /**
     * this is a public testing Action to envoke a particular model
     * 
     * @param array $getVars - Keys=>Values from GET
     * @return string - this string contain HTML of generated view
     */
     public function indexAction (array $getVars)
    {
        //here we initiate the model obj and request the data
        $newModel = new TemplateListModel;
        $modelReturn = $newModel->returnData($getVars);
        
        //at this point we request data to be packed to view and returned form controller
        return $this->invokeLoader($modelReturn);
    }

}
