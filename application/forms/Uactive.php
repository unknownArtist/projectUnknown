<?php

class Application_Form_Uactive extends Zend_Form
{

    public function init()
    {
       
		$this->addElement('password', 'password', array('label' => 'Enter your Password'));
		$this->addElement('password', 'password2', array('label' => 'Confirm your Password',
		    			  'validators' => array(
		        		   array('identical', false, array('token' => 'password'))
		   				  )
						  ));
		
       $submit = $this->addElement('submit', 'submit');
    }


}   