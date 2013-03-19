<?php
//this PHP will be alled by controller. It is assumed that it contains logics of
//getting appropriate news

class TemplateListModel
{
   public function returnData($params)
   {
       return "The sent parmas to model are". print_r($params, true);
   }
}