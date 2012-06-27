<?php

class Application_Form_Profile extends Zend_Form
{

    public function init()
    {

        $data = array(

        'Male' => 'Male',
        'Female' => 'Female',
        );

        $this->setMethod('post');
        $this->setAction('#');

        $firstName = new Zend_Form_Element_Text('firstName');
        $firstName->setLabel('firstName')
                  //->addValidator('alnum')
                  ->addValidator('regex', false, array('/^[a-zA-Z]/'))
                ->addValidator('Alnum', false, array('allowWhiteSpace' => true))
                  ->addErrorMessage('Kindly enter alplabets only')
                  ->setRequired(TRUE);


        $lastName = new Zend_Form_Element_Text('lastName');
        $lastName->setLabel('lastName')
                  //->addValidator('alnum')
                  ->addValidator('regex', false, array('/^[a-zA-Z]/'))
                ->addValidator('Alnum', false, array('allowWhiteSpace' => true))
                  ->addErrorMessage('Kindly enter alplabets only')
                  ->setRequired(TRUE);

        $dateOfBirth = new Zend_Form_Element_Text('dateOfBirth');
        $dateOfBirth->setLabel('dateOfBirth')
                  ->addValidator('date')
                  ->addErrorMessage('Kindly enter Date in YYYY-MM-DD format')
                    ->setRequired(TRUE);

        $profilePic = new Zend_Form_Element_Text('profilePic');
        $profilePic->setLabel('profilePic')
             ->setRequired(TRUE);


        $gender = new Zend_Form_Element_Select('gender');
        $gender->setLabel('gender')
              ->setMultiOptions($data)
              ->setRequired(true)
              ->addValidator('NotEmpty', true);


        $website = new Zend_Form_Element_Text('website');
        $website->setLabel('website')
             ->setRequired(TRUE);

        $objective = new Zend_Form_Element_TextArea('objective');
        $objective->setLabel('objective')
             ->setRequired(TRUE);

        $country = new Zend_Form_Element_Text('country');
        $country->setLabel('country')
             ->setRequired(TRUE);

        $region = new Zend_Form_Element_Text('region');
        $region->setLabel('region')
             ->setRequired(TRUE);

        $city = new Zend_Form_Element_Text('city');
        $city->setLabel('city')
             ->setRequired(TRUE);

        $street = new Zend_Form_Element_Text('street');
        $street->setLabel('street')
             ->setRequired(TRUE);

        $house = new Zend_Form_Element_Text('house');
        $house->setLabel('house')
             ->setRequired(TRUE);

        
        $profilePic    = new Zend_Form_Element_File('profilePic');
        $profilePic->setLabel('Select the file to upload:')
                      ->setDestination(APPLICATION_PATH.'/../public/images')
                      ->addValidator('Count', false, 1) // ensure only 1 file
                      ->addValidator('Size', false, 102400) // limit to 1MB
                      ->addValidator('Extension', false, 'jpg,jpeg,png,gif');
        
       
             
        $submitprofile = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $firstName,
            $lastName,
            $dateOfBirth,
            $profilePic,
            $gender,
            $website,
            $objective,
            $country,
            $region,
            $city,
            $street,
            $house,
            $profilePic,
            $submitprofile,

            ));
    }


}

