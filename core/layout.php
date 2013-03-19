<?php
//this class will print all HTMLs to Browser based on tempalte HTML
//at this point all blocks are described in code

class layout
{
    protected $main;
    protected $header;
    protected $nav;
    protected $footer;
    protected $error = false;
    protected $errorCausedBy;
    
    //the constructor sets the atributes according request
    public function __construct($sentContent)
    {
        //fetching main data
        if (substr($sentContent['main'],0 ,5)=='Error'){
            $this->error= true;
            $this->errorCausedBy[] = 'main';
        };
        $this->main = $sentContent['main'];

        //fetching attributes form every block
        foreach ($sentContent['blocks'] as $key=>$value){
            if (substr($value, 0, 5)=='Error'){
                $this->error = true;
                $this->errorCausedBy[] = $key;
            }
            $this->$key = $value;
        }
    }
    public function render()
    {
        print 'we are in render <br> the data sent to Render is:<pre>';
        print_r ($this);
        print '</pre>';

    }
    
}
