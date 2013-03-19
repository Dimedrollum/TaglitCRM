<?php
// this is a test controller
//the controller class needs to initiate 
class TemplateController
{
    //this is a test method which sends request to model
    //gets data form model
    //and requests packing to view
    public function listAction (array $getVars)
    {
        //here we initiate the model obj and request the data
        $newModel = new TemplateListModel;
        $modelResult = $newModel->returnData($getVars);
        
        //at this point we request data to be packed to view and returned form controller
        return $this->packToView($modelResult);
    }
    
    //the following method sends data to view and returns result to public method
    private function packToView($toPack)
    {
        $newView = new TemplateView;
        $viewResult = $newView->returnContent($toPack);
        return $viewResult;
    }
}
