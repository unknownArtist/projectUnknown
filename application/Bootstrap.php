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

}

