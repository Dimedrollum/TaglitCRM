<?php

//this is a dispatcher which will sends requests to appropriate MVC as long as 
//any additional blocks required

class Dispatcher
{
    public function __construct($dispatchRequest) {
        print_r($dispatchRequest);
    }
    
    public function build()
    {
        
    }
};