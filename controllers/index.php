<?php
/**
 * This is the basic controller which contins all common methods + Index Action
 */
class IndexController
{
    //attributes
    /**
     *The name of controller to define View folder. Gets defined in __constructor
     * 
     * @var string 
     */
    protected $controllerName;
    
    /**
     *The name of view HTML which is going to be invoked. Gets defined in Action.
     * 
     * @var string 
     */
    protected $view;
    
    /**
     *Define model which is going to be requested
     * 
     * @var string 
     */
    protected $modelName;
    
    /**
     * Model invoked in MVC by action
     *
     * @var ModelObj
     */
    protected $model;
    
    /**
     * Data returned by model and is going to be sent to view
     *
     * @var array 
     */
    protected $data;
    
    /**
     *The final HTML render returned by packed view
     * 
     * @var string 
     */
    public $render;
    
    /**
     *Params sent in _GET
     * 
     * @var array 
     */
    protected $params;
    
    /**
     * Definition of ControlerName
     */
    public function __construct()
    {
        $this->controllerName = "template";
    }

    /**
     * Create Model Object and fetch data
     */
    protected function invokeModel ()
    {
        $this->model = new $this->modelName;
        $this->data = $this->model->returnData($this->params);
    }
    
    /**
     * Invoke View and pack data to render
     */
    protected function invokeView()
    {
        //check model error
        if (is_null($this->data)){
            new ErrorHandlerLib("Problem in requested Model");
                    die();
        }
        $viewLocation=SERVER_ROOT . "/views/" . $this->controllerName . "/" . $this->view . ".php";
        //checking html existance
        if (file_exists($viewLocation)){
            //creating variables from every modelData array position
           
            extract($this->data);

            //strting bufer
            ob_start();

            //including relevant html
            include $viewLocation;
            $this -> render =  ob_get_clean();
        }
        else{
            new ErrorHandlerLib("View HTML is absent");
                    die();;
        }
    }


    //Actions start here:
    
    /**
     * Test action. Defines View, Model, Params. Invokes Model and View
     *
     * 
     * @param array $getVars - Keys=>Values from GET
     * @return string - this string contain HTML of generated view
     */
     public function indexAction ($getVars)
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

}
