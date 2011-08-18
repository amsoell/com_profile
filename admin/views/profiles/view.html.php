<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * Profiles View
 */
class ProfileViewProfiles extends JView
{
	/**
	 * Profiles view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Get data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');
 
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;
		
		// Set the toolbar
		$this->addToolBar();		
 
		// Display the template
		parent::display($tpl);
		
		// Set the document
		$this->setDocument();		
	}
	
	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		JToolBarHelper::title(JText::_('COM_PROFILE_MANAGER_PROFILES'), 'profile');
		JToolBarHelper::deleteList('', 'profiles.delete');

		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id');
		$query->from('#__profile');
		$user =& JFactory::getUser();		
		$query->where('created_by=' . $user->id);
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();

        if (count($messages)>0) {
    		JToolBarHelper::editList('profile.edit');
        } else {
    		JToolBarHelper::addNew('profile.add');
        }
        

        if ($user->authorise('core.admin', 'com_profile')) {
                JToolBarHelper::preferences('com_profile');
        }        

	}	
	
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_PROFILE_ADMINISTRATION'));
	}	
}
