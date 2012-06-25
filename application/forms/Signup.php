<?php

class Application_Form_Signup extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setAction('sign-up');
        $this->setMethod('post');

        $submit = NULL; 
	      $firstName = $this->createElement('text','firstName');
        $firstName->setLabel('First Name:')
                  ->setRequired(false);
        $this->addElement($firstName);
                    
        $lastName = $this->createElement('text','lastName');
        $lastName->setLabel('Last Name:')
                 ->setRequired(false);
        $this->addElement($lastName);
        
                           
        $userName = $this->createElement('text','userName');
        $userName->setLabel('Username: *')
                 ->setRequired(true);
        $this->addElement($userName);

        $password = rand(1000,5000); 
        $password = $this->createElement('password','password');
        // $password->setLabel('Password:')
        //          ->addFilter('stripTags')
        //          ->addFilter('stringTrim')
        //          ->addValidator('StringLength', false, array(0,6));
        $this->addElement($password); 

       
        $emailID = $this->createElement('text','emailID');
        $emailID->setLabel('Email: *')
                 ->addValidator('EmailAddress')
                ->setRequired(true);    
        $this->addElement($emailID);



        $recaptchaKeys = Zend_Registry::get('config.recaptcha');
        $recaptcha = new Zend_Service_ReCaptcha($recaptchaKeys['publickey'], $recaptchaKeys['privatekey'],
                                                NULL, array('theme' => 'clean'));
         $captcha = new Zend_Form_Element_Captcha('captcha',
                                            array(
                                                'label' => 'Type the characters you see in the picture below.',
                                                'captcha' =>  'ReCaptcha',
                                                'captchaOptions'        => array(
                                                                                'captcha'   => 'ReCaptcha',
                                                                                'service' => $recaptcha
                                                                                 )
                                                )
                                                );


        $this->addElements(array($captcha, $submit));
        $submit = $this->addElement('submit', 'submit');

    }


}

