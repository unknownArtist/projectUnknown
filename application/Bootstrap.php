<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function init()
    {


    }

     protected function _initAutoload()
    {
    
    $this->options = $this->getOptions();
    Zend_Registry::set('config.recaptcha', $this->options['recaptcha']);
     }

 // protected function _initDb()  
 //  {  
 //    if ($this->hasPluginResource("db")) {  
 //      $dbResource = $this->getPluginResource("db");  
 //      $db = $dbResource->getDbAdapter();  
 //      Zend_Registry::set("db", $db);  
 //    }  
 //  }  
}

