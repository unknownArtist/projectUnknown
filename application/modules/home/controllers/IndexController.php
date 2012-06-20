<?php

class Home_IndexController extends Zend_Controller_Action
{

    public function init()
    {
	echo "new Page";      
  	/* Initialize action controller here */
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

