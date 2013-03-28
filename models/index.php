<?php
/**
 * The parent class for all models
 */
class IndexModel
{
    /**
     * DB abstraction
     * @var DbLib
     */
    protected $db;
    
    /**
     * Creates a DbLib object
     */
    public function __construct()
    {
        $this->db = new DbLib();
    }
}
    