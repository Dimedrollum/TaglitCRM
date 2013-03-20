<?php
//this class will print all HTMLs to Browser based on tempalte HTML
//at this point all blocks are described in code

class Layout
{
    protected $content;
    protected $main;
    protected $header;
    protected $nav;
    protected $footer;
    protected $error = false;
    protected $errorCausedBy;
    protected $layoutHtml = "index";
    protected $htmlPath;
    protected $errorHtml = "404";
    protected $errorPath;
    
    //the constructor sets the atributes according request
    public function __construct($sentContent)
    {   
        $this->content = $sentContent;
        //creating html path and Error paht
        $this->htmlPath = SERVER_ROOT."/public/".$this->layoutHtml.".php";
        $this->errorPath = SERVER_ROOT."/public/error/".$this->errorHtml.".php";

        
        //fetching main data
        if (substr($this->content['main'],0 ,5)=='Error'){
            $this->error= true;
            $this->errorCausedBy[] = 'main';
        };
        $this->main = $this->content['main'];

        //fetching attributes form every block
        foreach ($this->content['blocks'] as $key=>$value){
            if (substr($value, 0, 5)=='Error'){
                $this->error = true;
                $this->errorCausedBy[] = $key;
            }
            $this->$key = $value;
        }
    }
    public function render()
    {
        //chrcking if no error was introduced
        if (!$this->error){
            include $this->htmlPath;
        }
        else{
            //create error message
            foreach ($this->errorCausedBy as $value){
                $errorMessage = null;
                $errorMessage = $errorMessage . "<li>" . $this->content[$value] . "</li>";
            }
            
            include $this->errorPath;
        }

    }
    
}
?>