<?php
//this class sends info to footer
class MenuBlock
{
    private $blockHtml = "menu";
    private $blockPath;


    public function __construct()
    {
        $this->blockPath = SERVER_ROOT."/public/blocks/".$this->blockHtml.".php";
    }
    public function returnContent()
    {
        if (!file_exists($this->blockPath)){
            return "Error: Block $this->blockHtml HTML is not found";
        }
        ob_start();
        include $this->blockPath;
        return ob_get_clean();
    }
}