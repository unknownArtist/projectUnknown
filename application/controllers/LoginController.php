<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_Login();
        $this->view->lgnform = $form;

         $authAdapter = $this->getAuthAdapter();

         if ($this->getRequest()->isPost()) 
            {
            
            $formData = $this->getRequest()->getPost();

            if ($form->isValid($formData)) 
                {
                
                    $userName    = $form->getValue('userName');
                    $password =    sha1($form->getValue('password'));
                    
                         $authAdapter->setIdentity($userName)
                                     ->setCredential($password);
                
                    $auth = Zend_Auth::getInstance();
                    $result = $auth->authenticate($authAdapter);
	             
                    if($result->isValid())
                        {
                        	
                            $userStatus = new Application_Model_Users();

                        	$emailcheck = strstr($userName, '@', true);
                        	if($emailcheck!=null)
                        	{
                        		$where = "emailID = '$userName'";
                        		
                        	}
                        	else
                        	{
                        		$where = "userName = '$userName'";
                        	}

                        	$data = $userStatus->fetchRow($where)->toArray();

                        	
                        	if($data['status'] == 1)
                        	{
                        		$userData = new Zend_Session_Namespace('Default');
                        		$userData->userID = $data['userID'];
                        		$userData->userName = $data['userName'];


                        		$this->_redirect('index');
                        	}
                        	else
                        	{
                        		$form->populate($formData);
                                $this->view->SignUpError = "yuor account is not activated";
                        	}
                   
                        }
                    else
                        {
                            $form->populate($formData);
                            $this->view->SignUpError = "Invalid Username or Password";
                        }
                 } 
            
            else            
                {
                    $form->populate($formData);
                }
    	}	
    }

    private function getAuthAdapter()
    {
        $auth = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        
        
        if(isset($_POST['userName']))
        {

        	$user = strstr($_POST['userName'], '@', true); // As of PHP 5.3.0
			
			if ($user!= NULL)
			{
				$auth->setTableName('users')
             	->setIdentityColumn('emailID')
             	->setCredentialColumn('password'); 
             	return $auth; 
			}
			
			else
			{       
			    
			    $auth->setTableName('users')
        	    ->setIdentityColumn('userName')
            	->setCredentialColumn('password');
		        return $auth;
   		 	}
   		}
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('login');
    }


}



