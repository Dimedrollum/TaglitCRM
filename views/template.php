<?php

//this is the class wich will pack data to approporiate view
class TemplateView
{
    public function returnData ($args)
    {
        return "This is the View return with following args:<br> $args";
    }
}