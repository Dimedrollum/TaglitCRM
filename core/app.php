<?php

class App
{
    // ?q=
    protected $requestPath;
    // modified $_GET
    protected $requestParams;
    
    /**
     * fetch request params from __GET
     */
    public function __construct()
    {
        $this->requestPath = (!empty($_GET['q'])) ? $_GET['q'] : null;
        
        $params = $_GET;
        unset($params['q']);
        $this->requestParams = $params;
    }
    
    //this part is gettin the all application parts connected
    /**
     * Connect all applicaton parts
     */
    public function run()
    {
        //add the Error handler
        require __DIR__.'/errorhandler.php';
        
        // Load classloader - autoloader. This component will auto-include files with relevant classes
        require __DIR__.'/autoloader.php';
        new Autoloader();

        // Get env
        require SERVER_ROOT . '/configs/env.php';
        
        // Load config
        require SERVER_ROOT . '/configs/' . APP_ENV . '.php';
        
        //load DB handler
        require __DIR__.'/db.php';
        
        // Process URL
        require __DIR__.'/router.php';
        $router = new Router();
        $forDispatch = $router->process($this->requestPath, $this->requestParams);
        
        
        // Get content & blocks
        //dispatch
        require __DIR__.'/dispatcher.php';
        $dispatcher = new Dispatcher($forDispatch);
        $content = $dispatcher->build();
        
        // Layout
        require __DIR__.'/layout.php';
        $layout = new Layout($content);

        // return HTML
        echo $layout->render();
    }
}
