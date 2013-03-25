<?php

//this class contains the fetched data from HTML
class BasicBlock
{
    private $blockName = "links";
    private $blockPath;

//get the block name and block path during the obj creation
    public function __construct($block)
    {
        $this->blockName = $block;
        $this->blockPath = SERVER_ROOT."/templates/blocks/".$this->blockName.".php";
        
    }
    // request the HTML and send it back as a return
    public function returnContent()
    {
        if (!file_exists($this->blockPath)){
            return "Error: Block $this->blockName HTML is not found";
        }
        ob_start();
        include $this->blockPath;
        return ob_get_clean();
    }
}

?>