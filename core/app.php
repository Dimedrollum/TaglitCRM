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

        // Load config
        
        // Process URL
        $router = new Router();
        
        // Get content
        //dispatch
        
        // Get blocks
        
        // Layout
        
        // return HTML
    }
}
