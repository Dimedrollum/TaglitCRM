<?php
/**
 * Testing model with DB connection
 */
class TemplateDBModel extends IndexModel {

    /**
     * Test method returning data fron DB
     * 
     * @param array $params - additional params sent by _GET
     * @return array - data to be packed
     */
    public function returnData($params=null) {
        $res = $this->db->execute(
                'SELECT `Value` FROM `template` WHERE `Key` = :key', array(':key' => 'Age')
        );

        $res = $this->db->execute(
                'SELECT * FROM `template`'
        );

        $result = $res->fetchAll(PDO::FETCH_ASSOC);
        
        $person = array();
        
        foreach ($result as $r) {
            $person[$r['Key']] = $r['Value'];
        }


        return array('params' => "these" . print_r($params, true), 'name' => $person['Name'], 'age' => $person['Age']);
    }

}
