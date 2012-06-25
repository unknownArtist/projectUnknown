<?php

class IndexController extends Zend_Controller_Action
{
public function init()
    {
        
    }

    public function indexAction()
    {
        
        
        //.........profile form........
        $form = new Application_Form_Profile();
        $this->view->profileForm = $form;

        //.........UserPic form........
        $formUserPic = new Application_Form_UserPic();
        $this->view->UserPicForm = $formUserPic;

        //.........Education form........
        $formEducation = new Application_Form_Education();
        $this->view->EducationForm = $formEducation;

        //.........Achievements form........
        $formAchievements = new Application_Form_Achievements();
        $this->view->AchievementsForm = $formAchievements;

        //.........Certifications form........
        $formcert = new Application_Form_Certifications();
        $this->view->certForm = $formcert;

        //.........Contacts form........
        $formcContacts = new Application_Form_Contacts();
        $this->view->ContactsForm = $formcContacts;

        //.........Experience form........
        $formcExperience = new Application_Form_Experience();
        $this->view->ExperienceForm = $formcExperience;

        //.........Publications form........
        $formcPublications = new Application_Form_Publications();
        $this->view->PublicationsForm = $formcPublications;

        //.........Refrences form........
        $formcRefrences = new Application_Form_Refrences();
        $this->view->RefrencesForm = $formcRefrences;

        //.........Seminars form........
        $formcSeminars = new Application_Form_Seminars();
        $this->view->SeminarsForm = $formcSeminars;

        //.........Skills form........
        $formcSkills = new Application_Form_Skills();
        $this->view->SkillsForm = $formcSkills;

        //.........Languages form........
        $formcLanguages = new Application_Form_Languages();
        $this->view->LanguagesForm = $formcLanguages;


        
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
                    //$this->_redirect('home');
                }
                else
                {
                    echo "not Updated";
                }
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

            $data = $tmp->fetchAll($where)->toArray();
            $form->populate($data);
            
         }
    

    }




}


