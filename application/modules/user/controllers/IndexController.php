<?php

class User_IndexController extends Zend_Controller_Action
{
	public function init()
	{
		
	}

	public function indexAction()
	{
		
		//$form = new Application_Form_Login();
		
    	$form = new Application_Form_Profile();
		$this->view->profileForm = $form;
 		
 		if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $data = array(
                'firstName' => $form->getValue('firstName'),
                'lastName' => $form->getValue('lastName'),
                'dateOfBirth' => $form->getValue('dateOfBirth'),
                'profilePic' => $form->getValue('profilePic'),
                'website' => $form->getValue('website'),
                'objective' => $form->getValue('objective'),
                'country'    => $form->getValue('country'),
                'region'    => $form->getValue('region'),
                'city'    => $form->getValue('city'),
                'street'    => $form->getValue('street'),
                'house'    => $form->getValue('house'),
                
                );

                $insertVal = new Application_Model_Profile();
                
                $userData = new Zend_Session_Namespace('Default');
        		
        		$where = "userID = $userData->userID";
                
                if($insertVal->update($data,$where))
                {
                    echo "data updated";
                    $this->_redirect('home');
                }
                else
                {
                    echo "not inserted";
                }
            }
            else
            {
                $form->populate($formData);
            }

         }

         else
         {
         	//echo "error";
            
            
            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
        		
        	$where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();
            $form->populate($data);
            
         }
 	

	}



	public function insertProfileAction()
    {

		

       
    }
}
