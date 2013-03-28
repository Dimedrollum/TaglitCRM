<?php
/**
 * The parent class for all models
 */
class ModelLib
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
