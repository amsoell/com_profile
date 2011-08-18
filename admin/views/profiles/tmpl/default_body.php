<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
			<?php echo $item->fullname; ?>
		</td>
		<td align="right">
<?php if (!empty($item->avatar)): ?>		
		    <img src="/<?php echo $item->avatar; ?>" width="50" height="50" />
<?php endif; ?>			
		</td>		
	</tr>
<?php endforeach; ?>
