<?php

class SignUpController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body

$smtpServer = 'smtp.gmail.com';
$username = 'habibsehrish@gmail.com';
$password = 'h8lovestory';
$config = array(
                'ssl' => 'ssl',
                'auth' => 'login',
                'username' => $username,
                'password' => $password,
                'port' => 465
                );
$transport = new Zend_Mail_Transport_Smtp($smtpServer, $config);
Zend_Mail::setDefaultTransport($transport);


 if ($this->getRequest()->isPost() && $this->view->form->isValid($this->_getAllParams()))
         {

        
// $receiver = $_POST['userName'];
// $to = $_POST['emailID'];

$mail = new Zend_Mail();
$mail->addTo($_POST['emailID'], $_POST['userName']);
$mail->setSubject('you have registered!');
$mail->setBodyText('Congratulations!Get your account activated');
$mail->setFrom('habibsehrish@gmail.com', 'Sehrish');
$mail->send($transport);
//$this->_redirect('index');
}

   // }


        

    
    }

}
    

  





