<?php
// No direct access to this file
defined('_JEXEC') or die;
 
// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * Profile Form Field class for the Profile component
 */
class JFormFieldProfile extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Profile';
 
	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,fullname,avatar');
		$query->from('#__profile');
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();
		$options = array();
		if ($messages)
		{
			foreach($messages as $message) 
			{
				$options[] = JHtml::_('select.option', $message->id, $message->fullname);
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
