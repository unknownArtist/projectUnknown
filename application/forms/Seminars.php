<?php

class Application_Form_Seminars extends Zend_Form
{

    public function init()
    {
       	$this->setMethod('post');
        $this->setAction('#');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('title')
                ->addValidator('alnum')
                ->addValidator('regex', false, array('/^[a-zA-Z0-9]/'))
                ->addErrorMessage('please enter alplanumaric only')
                ->setRequired(TRUE);

        $date = new Zend_Form_Element_Text('date');
        $date->setLabel('date')
                        ->addValidator('date')
                        ->addErrorMessage('please enter Date in YYYY-MM-DD format')
                        ->setRequired(TRUE);

        $description = new Zend_Form_Element_TextArea('description');
        $description->setLabel('description')
             ->setRequired(TRUE);
       
             
        $submitSeminars = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $title,
            $date,
            $description,
            $submitSeminars,

            ));
    }


}

