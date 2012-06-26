<?php

class Application_Form_Certifications extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');
        $this->setAction('#');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('title')
                //->addValidator('alnum')
                ->addValidator('regex', false, array('/^[a-zA-Z0-9]/'))
                ->addValidator('Alnum', false, array('allowWhiteSpace' => true))
                ->addErrorMessage('please enter alplanumaric only')
                ->setRequired(TRUE);

        $dateOfCompletion = new Zend_Form_Element_Text('dateOfCompletion');
        $dateOfCompletion->setLabel('dateOfCompletion')
                        ->addValidator('date')
                        ->addErrorMessage('please enter Date in YYYY-MM-DD format')
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

