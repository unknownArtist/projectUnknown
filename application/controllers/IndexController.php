<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
       
    }

    public function indexAction()
    {
      
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

$receiver = $_GET['userName'];
$to = $_GET['email'];

$mail = new Zend_Mail();
$mail->addTo($to, $receiver);
$mail->setSubject('you have registered!');
$mail->setBodyText('Congratulations!Get your account activated');
$mail->setFrom('habibsehrish@gmail.com', 'Sehrish');
$mail->send();
 
    }


}


/* Search Module
   Login System
   SignUp Process
   whats Trending on our APP
   
*/

