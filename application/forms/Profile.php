<?php

class Application_Form_Profile extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');
        $this->setAction('#');

        $firstName = new Zend_Form_Element_Text('firstName');
        $firstName->setLabel('firstName')
             ->setRequired(TRUE);

        $lastName = new Zend_Form_Element_Text('lastName');
        $lastName->setLabel('lastName')
             ->setRequired(TRUE);

        $dateOfBirth = new Zend_Form_Element_Text('dateOfBirth');
        $dateOfBirth->setLabel('dateOfBirth')
             ->setRequired(FALSE);

        $profilePic = new Zend_Form_Element_Text('profilePic');
        $profilePic->setLabel('profilePic')
             ->setRequired(FALSE);

        $website = new Zend_Form_Element_Text('website');
        $website->setLabel('website')
             ->setRequired(FALSE);

        $objective = new Zend_Form_Element_TextArea('objective');
        $objective->setLabel('objective')
             ->setRequired(FALSE);

        $country = new Zend_Form_Element_Text('country');
        $country->setLabel('country')
             ->setRequired(FALSE);

        $region = new Zend_Form_Element_Text('region');
        $region->setLabel('region')
             ->setRequired(FALSE);

        $city = new Zend_Form_Element_Text('city');
        $city->setLabel('city')
             ->setRequired(FALSE);

        $street = new Zend_Form_Element_Text('street');
        $street->setLabel('street')
             ->setRequired(FALSE);

        $house = new Zend_Form_Element_Text('house');
        $house->setLabel('house')
             ->setRequired(FALSE);

       
             
        $submitprofile = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $firstName,
            $lastName,
            $dateOfBirth,
            $profilePic,
            $website,
            $objective,
            $country,
            $region,
            $city,
            $street,
            $house,
            $submitprofile,

            ));
    }


}

