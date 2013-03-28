<?php
/**
 * This is a universal DB operation class
 */
class DbLib
{
    private $pdo;
    /**
     * Class: universal DB operation class. Constructor: defines PDO
     */
    public function __construct()
    {
        // Data Source Name (DSN)
        $dsn = 'mysql://host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
        
        // Force mysql connection encoding to utf8
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );
        
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    }
    
    /**
     * Run SQL and get results
     * 
     * @param string $sql - prepared SQL request
     * @param array $params - the substitute values
     * @return PDOStatement
     */
    public function execute($sql, $params=array())
    {
        // Ex:
        // $sql = select * from tab1 where id=:id
        // $params = array(':id' => 5)
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute($params);
        
        if ($result) {
            return $stmt;
        }
        return null;
    }
}
