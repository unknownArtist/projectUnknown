<?php

class SignUpController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // Displaying the Signup form
      $form = new Application_Form_Signup();
      $this->view->form = $form;


      if ($this->getRequest()->isPost() && $this->view->form->isValid($this->_getAllParams()))
        {
            //inserting Username,Password and EmailID in "users" table 
              $user = new Application_Model_Users();
              $u_data = array(

                    'userName'    =>    $form->getValue('userName'),
                    'password'    =>    $password =  md5( rand(0,1000) ),
                    'emailID'     =>    $form->getValue('emailID'),
                );

            //inserting Firstname and Lastname in "profile" table
              $profile = new Application_Model_Profile();
              $p_data =  array(

                    'firstName'    =>    $form->getValue('firstName'),
                    'lastName'    =>     $form->getValue('lastName'),
                );

            //checking for unique username in database
              $username = $form->getValue('userName');
              $where = "userName = '$username'";
              $u_name = $user->fetchAll($where)->toArray();  

              if(empty($u_name))//if the username entered in Signup form is unique
                {
                    //checking for unique emailID in database
                    $email = $form->getValue('emailID');
                    $where = "emailID = '$email'";
                    $mail = $user->fetchAll($where)->toArray();

                        if(empty($mail))//if the emailId entered in Signup form is unique
                        {
                          //insert the entries of the form in the respective tables
                           $user->insert($u_data);
                           $profile->insert($p_data);
                           $this->view->successMessage = "Your Account has been created Kindly check your email";

                           //after insertion send a confirmation email to the user with an activation link
                            $smtpServer = 'smtp.gmail.com';
                            $username = 'habibsehrish@gmail.com';
                            $Password = 'h8lovestory';
                            $config = array(
                                            'ssl' => 'ssl',
                                            'auth' => 'login',
                                            'username' => $username,
                                            'password' => $Password,
                                            'port' => 465
                                            );
                            $transport = new Zend_Mail_Transport_Smtp($smtpServer, $config);
                            Zend_Mail::setDefaultTransport($transport);
                            $message = '

                                    Thanks for signing up!
                                    Your account has been created, you can login with the following credentials after you 
                                    have activated your account by pressing the url below.

                                    ------------------------
                                    Username: '.$u_data['userName'].'
                                    Password: '.$password.'
                                    ------------------------

                                    Please click this link to activate your account:

                                    http://projectUnknown/activate-user/index/userName/'.$u_data['userName'].'/password/'.$password.'

                                    ';
                            $mail = new Zend_Mail();
                            $mail->addTo($_POST['emailID'], $_POST['userName']);
                            $mail->setSubject('Congratulations!You have registered!');
                            $mail->setBodyText($message);
                            $mail->setFrom('habibsehrish@gmail.com', 'Sehrish');
                            $mail->send($transport);  
                        }
                       else
                        {
                          echo "EmailID already taken.Please choose another one";//if emailID is not unique
                        }

               }
              else 
                {
                  echo "Name already taken.Please choose another one"; //if username is not unique
                }
           
        

        }
        
    }
  
}

    

  





