<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<form action="<?php echo JRoute::_('index.php?option=com_profile&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="profile-form" class="form-validate">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'COM_PROFILE_PROFILE_DETAILS' ); ?></legend>
		<?php foreach($this->form->getFieldset() as $field): ?>
			<?php if (!$field->hidden): ?>
				<div class="fltlft"><?php echo $field->label; ?></div>
			<?php endif; ?>
			<?php echo $field->input; ?><br style="clear: left;" />
		<?php endforeach; ?>
	</fieldset>
	<div>
		<input type="hidden" name="task" value="profile.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>