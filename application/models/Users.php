<?php

class Application_Model_Users extends Zend_Db_Table_Abstract
{
	protected $_name = 'users';
	protected $_primary = 'userID';

function checkUnique($userName)
    {
        $select = $this->_db->select()
                            ->from($this->_name,array('userName'))
                            ->where('userName=?',$userName);
                            // ->orwhere('emailID=?', $emailID);
        $result = $this->getAdapter()->fetchOne($select);
        if($result)
        {
            return true;
        }
         return false;
    }

}


