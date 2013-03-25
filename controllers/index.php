<?php
// this is a test controller
//the controller class needs to initiate 
class IndexController
{
    //defining view that will be loaded
    protected $controllerName = "template";
    protected $viewHtml= "index";
    protected $viewObj;
    
    private function invokeLoader ($modelReturn)
    {
        //here we are packind data
        //1st we initiate the Obj
         $this->viewObj=new ViewLoaderController($this->viewHtml, $this->controllerName);
        
        //then we request the render
        $this->viewObj->packView($modelReturn);
        
        //and return final render
        return $this->viewObj->viewRender;
    }
    
    public function listAction (array $getVars)
    {
        //here we initiate the model obj and request the data
        $newModel = new TemplateListModel;
        $modelReturn = $newModel->returnData($getVars);
        
        //at this point we request data to be packed to view and returned form controller
        return $this->invokeLoader($modelReturn);

    }
    
    //this is an index action
     public function indexAction (array $getVars)
    {
        //here we initiate the model obj and request the data
        $newModel = new TemplateListModel;
        $modelReturn = $newModel->returnData($getVars);
        
        //at this point we request data to be packed to view and returned form controller
        return $this->invokeLoader($modelReturn);

    }

}
