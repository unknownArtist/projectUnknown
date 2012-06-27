<?php

class Application_Form_Achievements extends Zend_Form
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
                  ->addErrorMessage('Kindly enter alplanumaric only')
             ->setRequired(TRUE);

        $description = new Zend_Form_Element_Text('description');
        $description->setLabel('description')
             ->setRequired(TRUE);
       
             
        $submitAchievements = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $title,
            $description,
            $submitAchievements,

            ));
    }


}

