<?php

class Application_Form_Languages extends Zend_Form
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

        $language = new Zend_Form_Element_Text('language');
        $language->setLabel('language')
                ->addValidator('alnum')
                ->addValidator('regex', false, array('/^[a-zA-Z]/'))
                ->addErrorMessage('Please enter valid name')
                ->setRequired(TRUE);

        $grade = new Zend_Form_Element_Select('grade');

        $grade->setLabel('grade')
              ->setMultiOptions($data)
              ->setRequired(true)
              ->addValidator('NotEmpty', true);

          
        $submitLanguages = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $language,
            $grade,
            $submitLanguages,

            ));
    }


}

