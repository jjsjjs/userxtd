<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_userxtd
 *
 * @copyright   Copyright (C) 2012 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Generated by AKHelper - http://asikart.com
 */

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');

if( JVERSION >= 3){
	JHtml::_('formbehavior.chosen', 'select');
}



// Init some API objects
// ================================================================================
$app 	= JFactory::getApplication() ;
$date 	= JFactory::getDate( 'now' , JFactory::getConfig()->get('offset') ) ;
$doc 	= JFactory::getDocument();
$uri 	= JFactory::getURI() ;
$user	= JFactory::getUser();


// Set value
$fieldset = $this->current_fieldset ;
?>
	
<fieldset class="adminform form-horizontal">
	<legend><?php echo isset($fieldset->label) ? $fieldset->label : JText::_('COM_USERXTD_EDIT_FIELDSET_'.$fieldset->name); ?></legend>
	
	<?php foreach($this->form->getFieldset($fieldset->name) as $field ): ?>
		<div class="control-group">
			<div class="control-label">
				<?php echo $field->label; ?>
			</div>
			<div class="controls">
				<?php echo $field->input; ?>
			</div>
		</div>
	<?php endforeach; ?>
	
	<br /><br />

</fieldset>