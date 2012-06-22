<?php

class Application_Form_Experience extends Zend_Form
{

    public function init()
    {
       	$this->setMethod('post');
        $this->setAction('#');

        $organization = new Zend_Form_Element_Text('organization');
        $organization->setLabel('organization')
             ->setRequired(TRUE);

        $designation = new Zend_Form_Element_Text('designation');
        $designation->setLabel('designation')
             ->setRequired(TRUE);

        $fromDate = new Zend_Form_Element_Text('fromDate');
        $fromDate->setLabel('fromDate')
             ->setRequired(TRUE);

        $toDate = new Zend_Form_Element_Text('toDate');
        $toDate->setLabel('toDate')
             ->setRequired(TRUE);

        $responsibilities = new Zend_Form_Element_TextArea('responsibilities');
        $responsibilities->setLabel('responsibilities')
             ->setRequired(TRUE);

        $recommendationLetter    = new Zend_Form_Element_File('recommendationLetter');
        $recommendationLetter->setLabel('Select the file to upload:(recommendationLetter)')
                      ->setDestination(APPLICATION_PATH.'/../public/images')
                      ->addValidator('Count', false, 1) // ensure only 1 file
                      ->addValidator('Size', false, 102400) // limit to 1MB
                      ->addValidator('Extension', false, 'jpg,jpeg,png,gif');
       
             
        $submitExperience = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $organization,
            $designation,
            $fromDate,
            $toDate,
            $responsibilities,
            $recommendationLetter,
            $submitExperience,

            ));
    }


}

