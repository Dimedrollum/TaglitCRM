<?php
//this class will print all HTMLs to Browser based on tempalte HTML
//at this point all blocks are described in code

class Layout
{
    protected $content;
    protected $layoutHtml = "index";
    protected $htmlPath;
    
    //the constructor sets the atributes according request
    public function __construct($sentContent)
    {   
        
        //check if there is no Main block
        
        if(array_key_exists('main', $sentContent['blocks'])){
            new ErrorHandlerLib("There is a block with same name as view");
            die();
        }
        else{
            //creating Content arra
            $this->content['main'] = $sentContent['main'];
            $this->content = $this->content + $sentContent['blocks'];
        }
        
        //creating html path and Error paht
        $this->htmlPath = SERVER_ROOT."/templates/".$this->layoutHtml.".php";

        

    }
    public function render()
    {
            extract($this->content);
            include $this->htmlPath;


    }
    
}
