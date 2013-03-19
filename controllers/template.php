<?php
// this is a test controller
//the controller class needs to initiate 
class TemplateController
{
    //defining view that will be loaded
    protected $viewName = "template";

    //this is a test method which sends request to model
    //gets data form model
    //and requests packing to view
    
    
    public function listAction (array $getVars)
    {
        //here we initiate the model obj and request the data
        $newModel = new TemplateListModel;
        $modelReturn = $newModel->returnData($getVars);
        
        //at this point we request data to be packed to view and returned form controller
        return $this->packToView($modelReturn);

    }
    
     public function indexAction (array $getVars)
    {
        //here we initiate the model obj and request the data
        $newModel = new TemplateListModel;
        $modelReturn = $newModel->returnData($getVars);
        
        //at this point we request data to be packed to view and returned form controller
        return $this->packToView($modelReturn);

    }
    
    //the following method sends data to view and returns result to public method
    public function packToView($dataToPack)
    {
        $viewClass = ucfirst($this->viewName) . "View";
        $view = new $viewClass;
        $mainRender = $view->returnData($dataToPack);
        return $mainRender;
    }
}
