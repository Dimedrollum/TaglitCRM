<?php

//this class contains the fetched data from HTML
class BlockLoaderLib
{
    private $blockName = "links";
    private $blockPath;

/**
 * Class: Fetches HTML data from block HTMLs
 * Constructor: defines class attributes
 * 
 * @param string $block - block name
 */
        
    public function __construct($block)
    {
        $this->blockName = $block;
        $this->blockPath = SERVER_ROOT."/templates/blocks/".$this->blockName.".php";
        
    }
    /**
     * Find the relevant Block HTML and return it
     * 
     * @return string - the erapped HTML block
     */
    public function returnContent()
    {
        if (!file_exists($this->blockPath)){
            new ErrorHandlerLib("Block $this->blockName HTML is not found");
                    die();
        }
        ob_start();
        include $this->blockPath;
        return ob_get_clean();
    }
}

?>
