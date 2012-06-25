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

      $users = new Application_Model_Users();
      $profile = new Application_Model_Profile();
      $form = new Application_Form_Signup();
      $this->view->form = $form;


        if ($this->getRequest()->isPost() && $this->view->form->isValid($this->_getAllParams()))
       {
        $user = new Application_Model_Users();
            $u_data = array(

                  'userName'    =>    $form->getValue('userName'),
                  'password'    =>    $form->getValue('password'),
                  'emailID'     =>    $form->getValue('emailID'),
              );

            $profile = new Application_Model_Profile();

            $p_data =  array(

                  'firstName'    =>    $form->getValue('firstName'),
                  'lastName'    =>    $form->getValue('lastName'),
              );

            $username = $form->getValue('userName');
            $where = "userName = '$username'";// if($d == '1')
            
            $u_name = $user->fetchAll($where)->toArray();   
            if(empty($u_name))
               {
                  $email = $form->getValue('emailID');
                  $where = "emailID = '$email'";


                  $mail = $user->fetchAll($where)->toArray();
                  if(empty($mail))
                  {
                     $user->insert($u_data);
                     $profile->insert($p_data);

                     $this->view->successMessage = "Your Account has been created Kindly check your email";
                      

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
                      $message = '

                              Thanks for signing up!
                              Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

                              ------------------------
                              Username: '.$u_data['userName'].'
                              Password: '.$u_data['password'].'
                              ------------------------

                              Please click this link to activate your account:

                              http://projectUnknown/activate.php?emailID='.$u_data['emailID'].'&userName='.$u_data['userName'].'

                              ';
                      $mail = new Zend_Mail();
                      $mail->addTo($_POST['emailID'], $_POST['userName']);
                      $mail->setSubject('Congratulations!You have registered!');
                      $mail->setBodyText($message);
                      $mail->setFrom('habibsehrish@gmail.com', 'Sehrish');
                      $mail->send($transport);
                     
                  }
                   
               }
               else 
                {

                 echo "Data Not inserted"; 

               }

               
           
            

       }
               
    }
  

}



/*
 


*/
    

  





