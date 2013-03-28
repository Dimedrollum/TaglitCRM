<?php
/**
 * This is Autoloader class
 */
class Autoloader {
    
    /**
     * Registers current object/method into PHP autoloader register
     */
    public function __construct()
    {
        spl_autoload_register(array($this, 'loader'));
    }

    
    /**
     * this metod will find and include the relevant file with class by class appendix 
     * 
     * @param string $className - the name of class which should be connected
     */
    private function loader($className)
    {
        //this file contains loader of items requested by dispatcher
        //Function 'load' checks whether $appendix sent is the same as in class naming
        // Check "controller" classes
        $this->load('Controller', $className);
        
        // Check "model" classes
        $this->load('Model', $className);
        
        
        // Check "block" classes
        $this->load('Block', $className);
        
    }
    /**
     * This method includes relevant class found
     * 
     * @param string $appendix - the appendix of class to undestand it's positon (Lib, Controller, Model)
     * @param string $className - the full name of class in format of ClassNameAppendix
     */
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
