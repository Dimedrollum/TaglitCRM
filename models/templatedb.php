<?php

//this PHP will be alled by controller. It is assumed that it contains logics of
//getting appropriate news

class TemplateDBModel extends ModelLib {

    public function returnData($params) {
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
        echo '<pre>';
        var_dump($res);
        var_dump($result);
        var_dump($person);
        echo '</pre>';

        return array('params' => "these" . print_r($params, true), 'name' => $result['Value'], 'age' => '$age[\'Value\']');
    }

}
