<?php

class Application_Form_Refrences extends Zend_Form
{

    public function init()
    {
       	$this->setMethod('post');
        $this->setAction('#');

        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('name')
                //->addValidator('alnum')
                ->addValidator('regex', false, array('/^[a-zA-Z]/'))
                ->addValidator('Alnum', false, array('allowWhiteSpace' => true))
                ->addErrorMessage('please enter valid name')
                ->setRequired(TRUE);

        $designation = new Zend_Form_Element_Text('designation');
        $designation->setLabel('designation')
                //->addValidator('alnum')
                ->addValidator('regex', false, array('/^[a-zA-Z0-9]/'))
                ->addValidator('Alnum', false, array('allowWhiteSpace' => true))
                ->addErrorMessage('please enter alplanumaric only')
                ->setRequired(TRUE);

        $organization = new Zend_Form_Element_Text('organization');
        $organization->setLabel('organization')
                //->addValidator('alnum')
                ->addValidator('regex', false, array('/^[a-zA-Z0-9]/'))
                ->addValidator('Alnum', false, array('allowWhiteSpace' => true))
                ->addErrorMessage('please enter alplanumaric only')
                ->setRequired(TRUE);

        $contact = new Zend_Form_Element_Text('contact');
        $contact->setLabel('contact')
             ->setRequired(TRUE);
       
             
        $submitRefrences = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $name,
            $designation,
            $organization,
            $contact,
            $submitRefrences,

            ));
    }


}

