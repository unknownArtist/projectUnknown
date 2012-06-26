<?php

class IndexController extends Zend_Controller_Action
{
public function init()
    {
        
    }

    public function indexAction()
    {
        
        $userData = new Zend_Session_Namespace('Default');
        //echo $userData->userID;
        $where = "userID = $userData->userID";

        $tmp = new Application_Model_Profile();
        $data = $tmp->fetchRow($where)->toArray();
        $this->view->userdata = $data;

        //---- achievements------
        $tmp1 = new Application_Model_achievements();
        //$where = "userID = $userData->userID";
        $dataachievements = $tmp1->fetchAll($where)->toArray();
        $this->view->achievementsdata = $dataachievements;
      
        //---- Certifications------
        $tmp2 = new Application_Model_Certifications();
        //$where = "userID = $userData->userID";
        $dataCertifications = $tmp2->fetchAll($where)->toArray();
        //print_r($dataCertifications);
        //die();
        $this->view->Certificationsdata = $dataCertifications;
        
        //---- Certifications------
        $tmp3 = new Application_Model_contacts();
        //$where = "userID = $userData->userID";
        $dataContacts = $tmp3->fetchAll($where)->toArray();
        $this->view->Contactsdata = $dataContacts;

        //------education-------
        $tmp4 = new Application_Model_education();
        //$where = "userID = $userData->userID";
        $dataeducations = $tmp4->fetchAll($where)->toArray();
        $this->view->educationdata = $dataeducations;
        
      
       
    

    }
    
    public function profileAction()
    {
        //.........profile form........
        $form = new Application_Form_Profile();
        $this->view->profileForm = $form;

         if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {

                if($form->getValue('profilePic'))
                {

                $data = array(
                'firstName'     => $form->getValue('firstName'),
                'lastName'      => $form->getValue('lastName'),
                'gender'      => $form->getValue('gender'),
                'dateOfBirth'   => $form->getValue('dateOfBirth'),
                'profilePic'    => $form->getValue('profilePic'),
                'website'       => $form->getValue('website'),
                'objective'     => $form->getValue('objective'),
                'country'       => $form->getValue('country'),
                'region'        => $form->getValue('region'),
                'city'          => $form->getValue('city'),
                'street'        => $form->getValue('street'),
                'house'         => $form->getValue('house'),
                
                );
                }

            else
                {

                $data = array(
                'firstName'     => $form->getValue('firstName'),
                'lastName'      => $form->getValue('lastName'),
                'gender'      => $form->getValue('gender'),
                'dateOfBirth'   => $form->getValue('dateOfBirth'),
                //'profilePic'    => $form->getValue('profilePic'),
                'website'       => $form->getValue('website'),
                'objective'     => $form->getValue('objective'),
                'country'       => $form->getValue('country'),
                'region'        => $form->getValue('region'),
                'city'          => $form->getValue('city'),
                'street'        => $form->getValue('street'),
                'house'         => $form->getValue('house'),
                );

                }

                $insertVal = new Application_Model_Profile();
                $userData = new Zend_Session_Namespace('Default');
                $where = "userID = $userData->userID";

                $insertVal->update($data,$where);
                
                    
                //     echo "data updated";
                     $this->_redirect('index');
                // }
                // else
                // {
                //     echo "not Updated";
                // }
            }   
            else
            {
                $form->populate($formData);

            }

         }

         else
         {

            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
                
            $where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();

            $form->populate($data);
            $this->view->hidden = $data;
            
         }

    }

    public function achievementsAction()
    {
        //.........Achievements form........
        $form = new Application_Form_Achievements();
        $this->view->AchievementsForm = $form;

        $userData = new Zend_Session_Namespace('Default');
        
        if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $data = array(
                'title' => $form->getValue('title'),
                'description' => $form->getValue('description'),
                'userID'      => $userData->userID,
                
                );

                $insertVal = new Application_Model_achievements();
                
                
                
                $where = "userID = $userData->userID";
                
                if($insertVal->insert($data,$where))
                {
                    echo "data inserted";
                    $this->_redirect('index');
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
            /*
            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
                
            $where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();

            $form->populate($data);
            */
            
         }
    }

    
    public function certificationsAction()
    {
        //.........Certifications form........
        $form = new Application_Form_Certifications();
        $this->view->CertificationsForm = $form;

        $userData = new Zend_Session_Namespace('Default');
        
        if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $data = array(
                'title' => $form->getValue('title'),
                'dateOfCompletion' => $form->getValue('dateOfCompletion'),
                'description' => $form->getValue('description'),
                'userID'      => $userData->userID,
                
                );

                $insertVal = new Application_Model_certifications();
                
                
                
                $where = "userID = $userData->userID";
                
                if($insertVal->insert($data,$where))
                {
                    echo "data inserted";
                    $this->_redirect('index');
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
            /*
            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
                
            $where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();

            $form->populate($data);
            */
            
         }
    }
    

        public function contactsAction()
    {
        //.........Contacts form........
        $form = new Application_Form_Contacts();
        $this->view->ContactsForm = $form;

        $userData = new Zend_Session_Namespace('Default');
        
        if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $data = array(
                'title' => $form->getValue('title'),
                'contact' => $form->getValue('contact'),
                'userID'      => $userData->userID,
                
                );

                $insertVal = new Application_Model_contacts();
                
                
                
                $where = "userID = $userData->userID";
                
                if($insertVal->insert($data,$where))
                {
                    echo "data inserted";
                    $this->_redirect('index');
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
            /*
            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
                
            $where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();

            $form->populate($data);
            */
            
         }
    }

    
    public function educationAction()
    {
        //.........Education form........
        $form = new Application_Form_Education();
        $this->view->EducationForm = $form;

        $userData = new Zend_Session_Namespace('Default');
        
        if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $data = array(
                'degree' => $form->getValue('degree'),
                'regNo' => $form->getValue('regNo'),
                'fromDate' => $form->getValue('fromDate'),
                'toDate' => $form->getValue('toDate'),
                'description' => $form->getValue('description'),
                'userID'      => $userData->userID,
                
                );

                $insertVal = new Application_Model_education();
                
                
                
                $where = "userID = $userData->userID";
                
                if($insertVal->insert($data,$where))
                {
                    echo "data inserted";
                    $this->_redirect('index');
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
            /*
            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
                
            $where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();

            $form->populate($data);
            */
            
         }
    }

    
    public function experienceAction()
    {
        //.........Experience form........
        $form = new Application_Form_Experience();
        $this->view->ExperienceForm = $form;

        $userData = new Zend_Session_Namespace('Default');
        
        if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $data = array(
                'organization' => $form->getValue('organization'),
                'designation' => $form->getValue('designation'),
                'fromDate' => $form->getValue('fromDate'),
                'toDate' => $form->getValue('toDate'),
                'responsibilities' => $form->getValue('responsibilities'),
                'userID'      => $userData->userID,
                
                );

                $insertVal = new Application_Model_experience();
                
                
                
                $where = "userID = $userData->userID";
                
                if($insertVal->insert($data,$where))
                {
                    echo "data inserted";
                    $this->_redirect('index');
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
            /*
            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
                
            $where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();

            $form->populate($data);
            */
            
         }
    }

    
    public function languagesAction()
    {
        //.........Languages form........
        $form = new Application_Form_Languages();
        $this->view->LanguagesForm = $form;

        $userData = new Zend_Session_Namespace('Default');
        
        if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $data = array(
                'language' => $form->getValue('language'),
                'grade' => $form->getValue('grade'),
                'userID'      => $userData->userID,
                
                );

                $insertVal = new Application_Model_languages();
                
                
                
                $where = "userID = $userData->userID";
                
                if($insertVal->insert($data,$where))
                {
                    echo "data inserted";
                    $this->_redirect('index');
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
            /*
            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
                
            $where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();

            $form->populate($data);
            */
            
         }
    }

    
    public function publicationsAction()
    {
        //.........Publications form........
        $form = new Application_Form_Publications();
        $this->view->PublicationsForm = $form;

        $userData = new Zend_Session_Namespace('Default');
        
        if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $data = array(
                'title' => $form->getValue('title'),
                'journal' => $form->getValue('journal'),
                'description' => $form->getValue('description'),
                'userID'      => $userData->userID,
                
                );

                $insertVal = new Application_Model_publications();
                
                
                
                $where = "userID = $userData->userID";
                
                if($insertVal->insert($data,$where))
                {
                    echo "data inserted";
                    $this->_redirect('index');
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
            /*
            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
                
            $where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();

            $form->populate($data);
            */
            
         }
    }

    
    public function refrencesAction()
    {
        //.........Refrences form........
        $form = new Application_Form_Refrences();
        $this->view->RefrencesForm = $form;

        $userData = new Zend_Session_Namespace('Default');
        
        if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $data = array(
                'name' => $form->getValue('name'),
                'designation' => $form->getValue('designation'),
                'organization' => $form->getValue('organization'),
                'contact' => $form->getValue('contact'),
                'userID'      => $userData->userID,
                
                );

                $insertVal = new Application_Model_refrences();
                
                
                
                $where = "userID = $userData->userID";
                
                if($insertVal->insert($data,$where))
                {
                    echo "data inserted";
                    $this->_redirect('index');
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
            /*
            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
                
            $where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();

            $form->populate($data);
            */
            
         }
    }

    
    public function seminarsAction()
    {
        //.........Seminars form........
        $form = new Application_Form_Seminars();
        $this->view->SeminarsForm = $form;

        $userData = new Zend_Session_Namespace('Default');
        
        if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $data = array(
                'title' => $form->getValue('title'),
                'date' => $form->getValue('date'),
                'description' => $form->getValue('description'),
                'userID'      => $userData->userID,
                
                );

                $insertVal = new Application_Model_seminars();
                
                
                
                $where = "userID = $userData->userID";
                
                if($insertVal->insert($data,$where))
                {
                    echo "data inserted";
                    $this->_redirect('index');
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
            /*
            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
                
            $where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();

            $form->populate($data);
            */
            
         }
    }

    
    public function skillsAction()
    {
        //.........Skills form........
        $form = new Application_Form_Skills();
        $this->view->SkillsForm = $form;

        $userData = new Zend_Session_Namespace('Default');
        
        if($this->getRequest()->isPost())
         {
            $formData = $this->getRequest()->getPost();

            if($form->isValid($formData))
            {
                $data = array(
                'skill' => $form->getValue('skill'),
                'grade' => $form->getValue('grade'),
                'userID'      => $userData->userID,
                
                );

                $insertVal = new Application_Model_skills();
                
                
                
                $where = "userID = $userData->userID";
                
                if($insertVal->insert($data,$where))
                {
                    echo "data inserted";
                    $this->_redirect('index');
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
            /*
            $tmp = new Application_Model_Profile();
            $userData = new Zend_Session_Namespace('Default');
                
            $where = "userID = $userData->userID";

            $data = $tmp->fetchRow($where)->toArray();

            $form->populate($data);
            */
            
         }
    }


}


