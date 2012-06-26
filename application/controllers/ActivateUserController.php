<?php

class ActivateUserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // Selecting the users table
    	$user = new Application_Model_Users();
    	$userName = $this->_request->getParam('userName');//getting userName from url passed in the confirmation email
		$where = "userName = '$userName'";
		$u_Name = $user->fetchAll($where)->toArray();

		if(!empty($u_Name))//if username is present
			{
    			//searching in db for the password passed in the url
				$password = $this->_request->getParam('password');
				$where = "password = '$password'";
				$u_password = $user->fetchAll($where)->toArray();
				
				if(!empty($u_password))//if email is present
				{
					//update the staus of the user from 0 to 1(user activated)
					$where = "userName = '$userName'";
					$data = array('status' => '1');
					$user->update($data, $where);
					$this->_redirect('uactive/index/userName/'.$userName);

				}
			}
			
		else
			{
			  echo "invalid operation.";
			}


     }


}

