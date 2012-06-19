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
                    $admin    = $form->getValue('userName');
                    $password = $form->getValue('password');
                    
                         $authAdapter->setIdentity($admin)
                                     ->setCredential($password);
                
                    $auth = Zend_Auth::getInstance();
                    $result = $auth->authenticate($authAdapter);
	             
                    if($result->isValid())
                        {
                   
                            $this->_redirect('home/index');
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
        echo $_POST['userName'];
        $temp = explode('@', $_POST['userName']);
        print_r($temp);
        die();
        
    }
        $auth->setTableName('users')
             ->setIdentityColumn('userName')
             ->setCredentialColumn('password');  

        $auth->setTableName('users')
             ->setIdentityColumn('userName')
             ->setCredentialColumn('password');      
        
        return $auth;
    }

}

