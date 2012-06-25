<?php

class Application_Form_Seminars extends Zend_Form
{

    public function init()
    {
       	$this->setMethod('post');
        $this->setAction('#');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('title')
             ->setRequired(TRUE);

        $date = new Zend_Form_Element_Text('date');
        $date->setLabel('date')
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

