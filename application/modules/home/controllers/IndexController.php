<?php

class Home_IndexController extends Zend_Controller_Action
{

    public function init()
    {

      $auth = Zend_Auth::getInstance();
    if (!($auth->hasIdentity())) 
    {
        $this->_redirect('index');
    }
    else
    {
        
    }


  }


    }


    public function indexAction()
    {
        $userData = new Zend_Session_Namespace('Default');
        echo $userData->userID;
        echo $userData->userName;
         
        // action body
        // comment
        
    }


}

