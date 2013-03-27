<?php
class ModelLib
{
    /**
     * DB abstraction
     * @var DbLib
     */
    protected $db;
    
    public function __construct()
    {
        $this->db = new DbLib();
    }
}
