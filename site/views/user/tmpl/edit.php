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
UserxtdHelper::_('include.core');


$app = JFactory::getApplication() ;
if( JVERSION >= 3){
	JHtml::_('formbehavior.chosen', 'select');
	if($app->isSite()){
		UserxtdHelper::_('include.fixBootstrapToJoomla');
	}
}else{
	UserxtdHelper::_('include.bluestork');
	// UserxtdHelper::_('include.fixBootstrapToJoomla');
}



// Init some API objects
// ================================================================================
$date 	= JFactory::getDate( 'now' , JFactory::getConfig()->get('offset') ) ;
$doc 	= JFactory::getDocument() ;
$uri 	= JFactory::getURI() ;
$user	= JFactory::getUser() ;



// For Site
// ================================================================================
if($app->isSite()) {
	UserxtdHelper::_('include.isis');
}



// Edit setting
// ================================================================================
$tabs = count( $this->fields ) > 1 ? true : false;

if($app->isAdmin()) {
	$span_left 	= 8 ;
	$span_right = 4 ;
	
	$width_left = 60 ;
	$width_right= 40 ;
}else{
	$span_left 	= 12 ;
	$span_right = 12 ;
	
	$width_left = 100 ;
	$width_right= 100 ;
}

?>
<script type="text/javascript">
	<?php if( $app->isSite() ): ?>
	WindWalker.fixToolbar(0, 300) ;
	<?php endif; ?>
	
	Joomla.submitbutton = function(task)
	{
		if (task == 'user.cancel' || document.formvalidator.isValid(document.id('user-form'))) {
			Joomla.submitform(task, document.getElementById('user-form'));
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_( JFactory::getURI()->toString() ); ?>" method="post" name="adminForm" id="user-form" class="form-validate form-horizontal" enctype="multipart/form-data">
	
	
	<?php foreach ($this->form->getFieldsets() as $group => $fieldset):// Iterate through the form fieldsets and display each one.?>
		<?php $fields = $this->form->getFieldset($group);?>
		<?php if (count($fields)):?>
		<fieldset>
			<?php if (isset($fieldset->label)):// If the fieldset has a label set, display it as the legend.?>
			<legend><?php echo JText::_($fieldset->label); ?></legend>
			<?php endif;?>
			<?php foreach ($fields as $field):// Iterate through the fields in the set and display them.?>
				<?php if ($field->hidden):// If the field is hidden, just display the input.?>
					<div class="control-group">
						<div class="controls">
							<?php echo $field->input;?>
						</div>
					</div>
				<?php else:?>
					<div class="control-group">
						<div class="control-label">
							<?php echo $field->label; ?>
							<?php if (!$field->required && $field->type != 'Spacer') : ?>
							<span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>
							<?php endif; ?>
						</div>
						<div class="controls">
							<?php echo $field->input; ?>
						</div>
					</div>
				<?php endif;?>
			<?php endforeach;?>
		</fieldset>
		<?php endif;?>
	<?php endforeach;?>
	
	
	<hr />
	<div class="bottom-actions">
		<?php echo JToolBar::getInstance('toolbar')->render('toolbar') ; ?>
	</div>
	
	
	<!-- Hidden Inputs -->
	<div id="hidden-inputs">
		<input type="hidden" name="option" value="com_userxtd" />
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	<div class="clr"></div>
</form>