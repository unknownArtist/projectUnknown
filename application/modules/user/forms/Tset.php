<?php

class User_Form_Tset extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');
        $this->setAction('#');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('title')
             ->setRequired(TRUE);

        $description = new Zend_Form_Element_Text('description');
        $description->setLabel('description')
             ->setRequired(TRUE);

        $certificate = new Zend_Form_Element_Text('certificate');
        $certificate->setLabel('certificate')
             ->setRequired(FALSE);
       
             
        $submitAchievements = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $title,
            $description,
            $certificate,
            $submitAchievements,

            ));
    }


}

