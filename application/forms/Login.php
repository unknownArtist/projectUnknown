<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
      	$this->setMethod('post');
        $this->setAction('login/index');

        $loginname = new Zend_Form_Element_Text('userName');
        $loginname->setLabel('userName')
        	 ->setRequired(TRUE);

       $password = new Zend_Form_Element_Password('password');
        $password->setLabel('password')
        	 ->setRequired(TRUE);
        	 
        $submitlogin = new Zend_Form_Element_Submit('login');

        $this->addElements(array(

        	$loginname,
        	$password,
        	$submitlogin,

        	));
    }


}

