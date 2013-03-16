<?php

class Autoloader {
    
    // Registers current object/method into PHP autoloader register
    public function __construct()
    {
        spl_autoload_register(array($this, 'loader'));
    }

    private function loader($className)
    {
        // Check "controller" classes
        $this->load('Controller', $className);
        
        // Check "model" classes
        $this->load('Model', $className);
        
        // Check "block" classes
        $this->load('Block', $className);
    }

    private function load($appendix, $className)
    {
        $apendixLength = strlen($appendix);
        if (substr($className, -$apendixLength) == $appendix) {
            $file = SERVER_ROOT . '/'.  strtolower($appendix).'s/'.strtolower(substr($className, 0, -$apendixLength)) . '.php';
            if (file_exists($file)) {
                require $file;
            }
        }
    }
}
