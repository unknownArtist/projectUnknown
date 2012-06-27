<?php

class Application_Form_Experience extends Zend_Form
{

    public function init()
    {
       	$this->setMethod('post');
        $this->setAction('#');

        $organization = new Zend_Form_Element_Text('organization');
        $organization->setLabel('organization')
                ->addValidator('regex', true, array('/^[a-zA-Z0-9_]/'))
                ->addValidator('Alnum', false, array('allowWhiteSpace' => true))
                ->addErrorMessage('Kindly enter alplanumaric only')
                ->setRequired(TRUE);

        $designation = new Zend_Form_Element_Text('designation');
        $designation->setLabel('designation')
                //->addValidator('alnum')
                ->addValidator('regex', true, array('/^[ a-zA-Z0-9]/'))
                ->addValidator('Alnum', false, array('allowWhiteSpace' => true))
                ->addErrorMessage('Kindly enter alplanumaric only')
                ->setRequired(TRUE);

        $fromDate = new Zend_Form_Element_Text('fromDate');
        $fromDate->setLabel('fromDate')
                        ->addValidator('date')
                        ->addErrorMessage('Kindly enter Date in YYYY-MM-DD format')
                        ->setRequired(TRUE);

        $toDate = new Zend_Form_Element_Text('toDate');
        $toDate->setLabel('toDate')
                        ->addValidator('date')
                        ->addErrorMessage('Kindly enter Date in YYYY-MM-DD format')
                        ->setRequired(TRUE);

        $responsibilities = new Zend_Form_Element_TextArea('responsibilities');
        $responsibilities->setLabel('responsibilities')
             ->setRequired(TRUE);
     
             
        $submitExperience = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $organization,
            $designation,
            $fromDate,
            $toDate,
            $responsibilities,
            $submitExperience,

            ));
    }


}

