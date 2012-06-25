<?php

class Application_Form_Skills extends Zend_Form
{

    public function init()
    {
      $data = array(

        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        );

       	$this->setMethod('post');
        $this->setAction('');

        $skill = new Zend_Form_Element_Text('skill');
        $skill->setLabel('skill')
             ->setRequired(TRUE);

        $grade = new Zend_Form_Element_Select('grade');

        $grade->setLabel('grade')
              ->setMultiOptions($data)
              ->setRequired(true)
              ->addValidator('NotEmpty', true);

          
        $submitSkills = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $skill,
            $grade,
            $submitSkills,

            ));
    }


}

