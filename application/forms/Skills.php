<?php

class Application_Form_Skills extends Zend_Form
{

    public function init()
    {
       	$this->setMethod('post');
        $this->setAction('');

        $skill = new Zend_Form_Element_Text('skill');
        $skill->setLabel('skill')
             ->setRequired(TRUE);

        $grade = new Zend_Form_Element_Text('grade');
        $grade->setLabel('grade')
             ->setRequired(TRUE);

        $score = new Zend_Form_Element_Select('score');

        $score->setLabel('score')
              ->setMultiOptions(array('1'=>'1', '2'=>'2'))
              ->setRequired(true)->addValidator('NotEmpty', true);

          
        $submitSkills = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $skill,
            $grade,
            //$score
            $submitSkills,

            ));
    }


}

