<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * ProfileList Model
 */
class ProfileModelProfiles extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields
		$query->select('id,fullname,avatar');
		// From the hello table
		$query->from('#__profile');
		// Only pull up user's own profiles
		$user =& JFactory::getUser();
				
        if (!$user->authorise('core.admin', 'com_profile')) {
    		$query->where('created_by=' . $user->id);
        }
		return $query;
	}
}
