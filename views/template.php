<?php
echo "test";
class TemplateView 
{
    public function returnContent($modelData)
    {
        return "This will be an thml version of data : $modelData" ;
    }
}