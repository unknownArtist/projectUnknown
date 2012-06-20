<?php

class Home_IndexController extends Zend_Controller_Action
{

    public function init()
    {
<<<<<<< HEAD
      $auth = Zend_Auth::getInstance();
    if (!($auth->hasIdentity())) 
    {
        $this->_redirect('index');
    }
    else
    {
        
    }

=======
	
>>>>>>> 35f2ea32a704e62006d07363bee87a02237da55c
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

