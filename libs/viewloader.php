<?php

/*This is a universal calss wich prepares appropriate view accordind to controller
 * and returns view data with ammended vars to Dispatcher
 */
class ViewLoaderLib {

    protected $viewToLoad;
    protected $parrentController;
    protected $modelReturn;
    public $viewRender;
    protected $viewPath;

    // definning view which will be laoded and returned
    /**
     * 
     */
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
    public function loadView()
    {
        //check model error
        if (is_null($this->modelReturn)){
            new ErrorHandlerLib("Problem in requested Model");
                    die();
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
            new ErrorHandlerLib("View HTML is absent");
                    die();
        }
    }

}
