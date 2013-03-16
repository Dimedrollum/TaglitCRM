<?php

class App
{
    // ?q=
    protected $requestPath;
    // modified $_GET
    protected $requestParams;
    
    // Sets values of properties (that need some calculations) on creating new object
    public function __construct()
    {
        $this->requestPath = $_GET['q'];
        
        $params = $_GET;
        unset($params['q']);
        $this->requestParams = $params;
    }
    
    public function run()
    {
        // Load classloader
        require __DIR__.'/autoloader.php';
        new Autoloader();

        // Get env
        require SERVER_ROOT . '/configs/env.php';
        
        // Load config
        require SERVER_ROOT . '/configs/' . APP_ENV . '.php';
        
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
