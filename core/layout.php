<?php
//this class will print all HTMLs to Browser based on tempalte HTML
//at this point all blocks are described in code

class Layout
{
    protected $content;
    protected $error = false;
    protected $errorCausedBy;
    protected $layoutHtml = "index";
    protected $htmlPath;
    protected $errorHtml = "404";
    protected $errorPath;
    
    //the constructor sets the atributes according request
    public function __construct($sentContent)
    {   
        
        //check if there is no Main block
        
        if(array_key_exists('main', $sentContent['blocks'])){
            $this->content['main'] = 'Error: there is a block with same name as view';
        }
        else{
            //creating Content arra
            $this->content['main'] = $sentContent['main'];
            $this->content = $this->content + $sentContent['blocks'];
        }
        
        //creating html path and Error paht
        $this->htmlPath = SERVER_ROOT."/templates/".$this->layoutHtml.".php";
        $this->errorPath = SERVER_ROOT."/templates/".$this->errorHtml.".php";

        
        //fetching main data
        if (substr($sentContent['main'],0 ,5)=='Error'){
            $this->error= true;
            $this->errorCausedBy[] = 'main';
        };
        //!!!$this->main = $sentContent['main'];

        //fetching attributes form every block
        foreach ($sentContent['blocks'] as $key=>$value){
            if (substr($value, 0, 5)=='Error'){
                $this->error = true;
                $this->errorCausedBy[] = $key;
            }
            //!!!$this->$key = $value;
        }
    }
    public function render()
    {
        //chrcking if no error was introduced
        if (!$this->error){
            extract($this->content);
            include $this->htmlPath;
        }
        else{
            //create error message
            $errorMessage = null;
            foreach ($this->errorCausedBy as $value){
                $errorMessage = $errorMessage . "<li>" . $this->content[$value] . "</li>";
            }
            
            include $this->errorPath;
        }

    }
    
}
