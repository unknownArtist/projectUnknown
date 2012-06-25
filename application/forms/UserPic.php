<?php

class Application_Form_UserPic extends Zend_Form
{

    public function init()
    {
       	$this->setMethod('post');
        $this->setAction('#');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('title')
             ->setRequired(TRUE);

        $pictureName    = new Zend_Form_Element_File('pictureName');
        $pictureName->setLabel('Select the file to upload:')
                      ->setDestination(APPLICATION_PATH.'/../public/images')
                      ->addValidator('Count', false, 1) // ensure only 1 file
                      ->addValidator('Size', false, 102400) // limit to 1MB
                      ->addValidator('Extension', false, 'jpg,jpeg,png,gif');
       
             
        $submitUserPic = new Zend_Form_Element_Submit('Save');

        $this->addElements(array(

            $title,
            $pictureName,
            $submitUserPic,

            ));
    }


}

