<?php

class UactiveController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */


    }

    public function indexAction()
    {
    	//Displaying the form
    	$form = new Application_Form_Uactive();
    	$this->view->form = $form;

      	 if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {

         	    //getting the password from the form and inserting it in the db
              $password = $form->getValue('password');
              $user = new Application_Model_Users();
           	  $userName = $this->_request->getParam('userName');
            	$where = "userName = '$userName'";
          	  $data = array('password' => sha1($form->getValue('password')));
          	  $user->update($data, $where);

          	  $this->view->successMsg = "Your Password has been changed";
  	        }
            
          }

	     

        	
	     


       	//getting the password from the form and inserting it in the db
           $password = $form->getValue('password');
    	     $user = new Application_Model_Users();
 		       $userName = $this->_request->getParam('userName');
  		     $where = "userName = '$userName'";
		       $data = array('password' => $form->getValue('password'));
		       $user->update($data, $where);
		       echo "Your Password has been changed!";
	}


       // 	//getting the password from the form and inserting it in the db
       //      $password = $form->getValue('password');
    	  //    $user = new Application_Model_Users();
 		    //  $userName = $this->_request->getParam('userName');
  		   //   $where = "userName = '$userName'";
		     // $data = array('password' => $form->getValue('password'));
		     // $user->update($data, $where);
		     // echo "Your Password has been changed!";
	
 
}



