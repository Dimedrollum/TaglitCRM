<?php

class Autoloader {
    
    // Registers current object/method into PHP autoloader register
    public function __construct()
    {
        spl_autoload_register(array($this, 'loader'));
    }

    //this metod will find and include the relevant file with class by class appendix
    private function loader($className)
    {
        //this file contains loader of items requested by dispatcher
        //Function 'load' checks whether $appendix sent is the same as in class naming
        // Check "controller" classes
        $this->load('Controller', $className);
        
        // Check "model" classes
        $this->load('Model', $className);
        
        // Check "lib" classes
        $this->load('Lib', $className);
        
    }
        //this function is requested above. This one exactly finds and 'require' the 
    //relevant file
    private function load($appendix, $className)
    {
        //here we define the last word and check if it is equal to requested appendix
        $apendixLength = strlen($appendix);
        if (substr($className, -$apendixLength) == $appendix) {
            //if yes we create a file path
            $file = SERVER_ROOT . '/'.  strtolower($appendix).'s/'.strtolower(substr($className, 0, -$apendixLength)) . '.php';
            //we check if file exists
            if (file_exists($file)) {
                //and if yes we include it
                require $file;
            }
        }
    }
}
