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

<<<<<<< HEAD
  }
=======

    }
>>>>>>> c6db08d377659b1e89eddbfffa0e9adf4c9c2e8e

    public function indexAction()
    {
        $userData = new Zend_Session_Namespace('Default');
        echo $userData->userID;
        echo $userData->userName;
         
        // action body
        // comment
        
    }


}

