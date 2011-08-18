<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
 
// import Joomla table library
jimport('joomla.database.table');
 
/**
 * Hello Table class
 */
class ProfileTableProfile extends JTable
{
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function __construct(&$db) 
	{
		parent::__construct('#__profile', 'id', $db);
	}
	
    public function store($updateNulls = false)
    {
            if (empty($this->created_by)) {
                $user   = JFactory::getUser();        
                $this->created_by = $user->get('id');
            }

            return parent::store($updateNulls);
    }                	
}
