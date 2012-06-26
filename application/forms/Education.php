<?php

class Application_Form_Education extends Zend_Form
{

    public function init()
    {
       	$this->setMethod('post');
        $this->setAction('#');

        $degree = new Zend_Form_Element_Text('degree');
        $degree->setLabel('degree')
                ->addValidator('alnum')
                ->addValidator('regex', false, array('/^[a-zA-Z]/'))
                ->addErrorMessage('Kindly enter alplabets only')
                ->setRequired(TRUE);

        $regNo = new Zend_Form_Element_Text('regNo');
        $regNo->setLabel('regNo')
             ->setRequired(TRUE);

        $fromDate = new Zend_Form_Element_Text('fromDate');
        $fromDate->setLabel('fromDate')
                        ->addValidator('date')
                        ->addErrorMessage('Kindly enter Date in YYYY-MM-DD format')
                        ->setRequired(TRUE);
             ->setRequired(TRUE);

        $toDate = new Zend_Form_Element_Text('toDate');
        $toDate->setLabel('toDate')
                        ->addValidator('date')
                        ->addErrorMessage('Kindly enter Date in YYYY-MM-DD format')
                        ->setRequired(TRUE);
             ->setRequired(TRUE);

        $description = new Zend_Form_Element_Text('description');
        $description->setLabel('description')
             ->setRequired(TRUE);

             
        $submitEducation = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $degree,
            $regNo,
            $fromDate,
            $toDate,
            $description,
            $submitEducation,

            ));
    }


}

