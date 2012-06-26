<?php

class Application_Form_Publications extends Zend_Form
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
                ->addErrorMessage('please enter a valid name')
                ->setRequired(TRUE);

        $journal = new Zend_Form_Element_Text('journal');
        $journal->setLabel('journal')
                //->addValidator('alnum')
                ->addValidator('regex', false, array('/^[a-zA-Z0-9]/'))
                ->addValidator('Alnum', false, array('allowWhiteSpace' => true))
                ->addErrorMessage('please enter a valid name')
                ->setRequired(TRUE);

        $description = new Zend_Form_Element_TextArea('description');
        $description->setLabel('description')
             ->setRequired(TRUE);
       
             
        $submitPublications = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $title,
            $journal,
            $description,
            $submitPublications,

            ));
    }


}

