<?php
/**
 * Testing model with no logics
 */
class TemplateListModel extends IndexModel
{
    /**
     * Returns model date with no logics
     * 
     * @param type $params
     * @return array - array of data to be packed in view
     */
   public function returnData($params)
   {
       $modelResult['params'] = "The sent parmas to model are". print_r($params, true);
       $modelResult['name'] = "DLL";
       $modelResult['age'] = 28;
       return $modelResult;
   }
}