<?php

class Application_Form_Certifications extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');
        $this->setAction('#');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('title')
             ->setRequired(TRUE);

        $dateOfCompletion = new Zend_Form_Element_Text('dateOfCompletion');
        $dateOfCompletion->setLabel('dateOfCompletion')
             ->setRequired(TRUE);

        $description = new Zend_Form_Element_Text('description');
        $description->setLabel('description')
             ->setRequired(TRUE);
       
             
        $submitCertifications = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $title,
            $dateOfCompletion,
            $description,
            $submitCertifications,

            ));
    }


}

