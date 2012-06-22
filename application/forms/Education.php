<?php

class Application_Form_Education extends Zend_Form
{

    public function init()
    {
       	$this->setMethod('post');
        $this->setAction('#');

        $digree = new Zend_Form_Element_Text('digree');
        $digree->setLabel('digree')
             ->setRequired(TRUE);

        $regNo = new Zend_Form_Element_Text('regNo');
        $regNo->setLabel('regNo')
             ->setRequired(TRUE);

        $fromDate = new Zend_Form_Element_Text('fromDate');
        $fromDate->setLabel('fromDate')
             ->setRequired(TRUE);

        $toDate = new Zend_Form_Element_Text('toDate');
        $toDate->setLabel('toDate')
             ->setRequired(TRUE);

        $description = new Zend_Form_Element_Text('description');
        $description->setLabel('description')
             ->setRequired(TRUE);

        $recommendationLetter = new Zend_Form_Element_Text('recommendationLetter');
        $recommendationLetter->setLabel('recommendationLetter')
             ->setRequired(FALSE);
       
             
        $submitEducation = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $digree,
            $regNo,
            $fromDate,
            $toDate,
            $description,
            $recommendationLetter,
            $submitEducation,

            ));
    }


}

