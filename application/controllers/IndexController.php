<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
<<<<<<< HEAD

=======
>>>>>>> d8bdd793f39085a11bf38573d01a1032aae85938
    }

    public function indexAction()
    {
     
      $users = new Application_Model_Users();
      $form = new Application_Form_Signup();
      $this->view->form = $form;


      

    if ($this->getRequest()->isPost() && $this->view->form->isValid($this->_getAllParams()))
        
              {
              
                $data = array('userName' => $form->getValue('userName'),
                'emailID' => $form->getValue('emailID'),
                'password' => $form->getValue('password'));



                  if($users->checkUnique($data['userName']))
                  {
                  $this->view->errorMessage = "Name already taken. Please choose another one.";
                   return;
                  }
                // if($users->checkUnique($data['emailID'])) 
                //         {
                //          $this->view->errorMessage = "Email already taken. Please choose another one.";
                //          return;
                
             
              

                $users->insert($data);

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

                $mail = new Zend_Mail();
                $mail->addTo($_POST['emailID'], $_POST['userName']);
                $mail->setSubject('you have registered!');
                $mail->setBodyText('Congratulations!Get your account activated');
                $mail->setFrom('habibsehrish@gmail.com', 'Sehrish');
                $mail->send($transport);

              }




               
    }
              
 }








    public function insertProfileAction()
    {
        // action body
    }






