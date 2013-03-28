<?php
// this is a test controller
//the controller class needs to initiate 

class TemplateController extends IndexController
{
    
    
    public function __construct() {
        $this->controllerName = "template";
    }
    /**
     * Action with No Logic template
     * 
     * @param array $getVars - Keys=>Values from GET
     * @return string - this string contain HTML of generated view
     */
    public function listAction (array $getVars)
    {
         //definition
        $this->view = "index";
        $this->modelName = 'TemplateListModel';
        $this->params = $getVars;
        
        //invoking
        $this->invokeModel();
        $this->invokeView();
        
        //returning
        return $this->render;        
    }
    /**
     * this is a public testing Action which invokes a model with DB connection
     * 
     * @param array $getVars - Keys=>Values from GET
     * @return string - this string contain HTML of generated view
     */
     public function dbAction (array $getVars)
    {
        //definition
        $this->view = "index";
        $this->modelName = 'TemplateDbModel';
        $this->params = $getVars;
        
        //invoking
        $this->invokeModel();
        $this->invokeView();
        
        //returning
        return $this->render;  

    }
    
    /**
     * this is a public testing Action to envoke a particular model
     * 
     * @param array $getVars - Keys=>Values from GET
     * @return string - this string contain HTML of generated view
     */
     public function indexAction (array $getVars)
    {
                //definition
        $this->view = "index";
        $this->modelName = 'TemplateListModel';
        $this->params = $getVars;
        
        //invoking
        $this->invokeModel();
        $this->invokeView();
        
        //returning
        return $this->render;

    }

}