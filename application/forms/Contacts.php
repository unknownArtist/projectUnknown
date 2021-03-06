<?php

class Application_Form_Contacts extends Zend_Form
{

    public function init()
    {
      	$this->setMethod('post');
        $this->setAction('#');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('title')
                //->addValidator('alnum')
                ->addValidator('regex', false, array('/^[a-zA-Z]/'))
                ->addValidator('Alnum', false, array('allowWhiteSpace' => true))
                ->addErrorMessage('Kindly enter alplabets only')
                ->setRequired(TRUE);

        $contact = new Zend_Form_Element_Text('contact');
        $contact->setLabel('contact')
             ->setRequired(TRUE);
             
        $submitContacts = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $title,
            $contact,
            $submitContacts,

            ));
    }


}

