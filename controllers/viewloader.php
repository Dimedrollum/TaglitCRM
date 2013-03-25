<?php

//this class will load pack and return relevant view data

class ViewLoaderController {

    protected $viewToLoad;
    protected $parrentController;
    protected $modelReturn;
    public $viewRender;
    protected $viewPath;

    // definning view which will be laoded and returned

    public function __construct($viewToLoad, $controller) {
        $this->viewToLoad = $viewToLoad;
        $this->parrentController = $controller;
        $this->viewPath = SERVER_ROOT . "/views/" . $this->parrentController . "/" . $this->viewToLoad . ".php";
    }

    //defining the data wich is going to be packed and invoking packer
    public function packView($modelReturn) {
        $this->modelReturn = $modelReturn;
        $this->loadView();


        
    }
    
    //load the appropriate view
    protected function loadView()
    {
        //check model error
        if (is_null($this->modelReturn)){
            $this->viewRender= "Error: Problem in Model";
        }
        //checking html existance
        if (file_exists($this->viewPath)){
            //creating variables from every modelData array position
           
            extract($this->modelReturn);

            //strting bufer
            ob_start();

            //including relevant html
            include $this->viewPath;
            $this -> viewRender =  ob_get_clean();
        }
        else{
            $this ->viewRender =  "Error: View HTML is absent";
        }
    }

}
