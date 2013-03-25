<?php

//this is the class wich will pack data to approporiate view
class LoadView
{   
    private $htmlPath;
    private $controller = 'template';
    //define the html gile to be used
    public function setHtml ($html)
    {
        $this->htmlPath = SERVER_ROOT."/public/views/".$this->controller."/".$html.".php";
    }
    
    // this maethod will return data packed to main view
    public function returnData ($modelData)
    {   
        //check model error
        if (is_null($modelData)){
            return "Error: Problem in Model";
        }
        //checking html existance
        if (file_exists($this->htmlPath)){
            //creating variables from every modelData array position
           
            extract($modelData);

            //strting bufer
            ob_start();

            //including relevant html
            include $this->htmlPath;
            $html = ob_get_clean();
            return $html;
        }
        return "Error: View HTML is absent";
        
     }
}