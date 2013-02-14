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
JHtml::_('behavior.multiselect');
UserxtdHelper::_('include.core');



// Init some API objects
// ================================================================================
$app 	= JFactory::getApplication() ;
$date 	= JFactory::getDate( 'now' , JFactory::getConfig()->get('offset') ) ;
$doc 	= JFactory::getDocument();
$uri 	= JFactory::getURI() ;
$user	= JFactory::getUser();
$userId	= $user->get('id');



// List Control
// ================================================================================
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$originalOrders = array();


// For Joomla!3.0
// ================================================================================
if( JVERSION >= 3 ) {
	JHtml::_('bootstrap.tooltip');
	JHtml::_('dropdown.init');
	JHtml::_('formbehavior.chosen', 'select');
	
	// For Site
	if($app->isSite()) {
		UserxtdHelper::_('include.isis');
	}
}else{
	
	// For Site
	if($app->isSite()) {
		UserxtdHelper::_('include.bluestork');
		// UserxtdHelper::_('include.fixBootstrapToJoomla');
	}
	
}



?>

<?php if( JVERSION >= 3 ): ?>
<!-- Sort Table by Filter seletor -->
<script type="text/javascript">
	
	<?php if( $app->isSite() ): ?>
	Userxtd.fixToolbar(40, 300) ;
	<?php endif; ?>
	
	Joomla.orderTable = function() {
		table = document.getElementById("sortTable");
		direction = document.getElementById("directionTable");
		order = table.options[table.selectedIndex].value;
		if (order != '<?php echo $listOrder; ?>') {
			dirn = 'asc';
		} else {
			dirn = direction.options[direction.selectedIndex].value;
		}
		Joomla.tableOrdering(order, dirn, '');
	}
</script>
<?php endif; ?>

<div id="<?php echo (JVERSION >= 3) ? 'joomla30' : 'joomla25' ?>">

<!-- Form Begin -->
<form action="<?php echo JFactory::getURI()->toString(); ?>" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<?php if(!empty( $this->sidebar) && $app->isAdmin()): ?>
		
		<!-- Sidebar -->
		<div id="j-sidebar-container" class="span2">
			<h4 class="page-header"><?php echo JText::_('JOPTION_MENUS'); ?></h4>
			<?php echo $this->sidebar; ?>
			
			<?php if( count($this->filter['filter']->getFieldset('filter')) > 0 ): ?>
			<hr />
			<div class="filter-select hidden-phone">
				<h4 class="page-header"><?php echo JText::_('JSEARCH_FILTER_LABEL');?></h4>
				
				<?php foreach( $this->filter['filter']->getFieldset('filter') as $filter ): ?>
				<label for="<?php echo $filter->id ; ?>" class="element-invisible"><?php echo $filter->title; ?></label>
				<?php echo $filter->input; ?>
				<hr class="hr-condensed" />
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
		<div id="j-main-container" class="span10">
	<?php else : ?>
		<div id="j-main-container">
	<?php endif;?>
	
	
	<!-- Filter-->
	<?php echo $this->loadTemplate('filter'); ?>

	
	<!-- Table -->
	<?php echo $this->loadTemplate('table') ; ?>
	
	
	
	<?php
		if( JFile::exists(JPATH_COMPONENT_ADMINISTRATOR.'/views/fields/tmpl/default_batch.php') ){
			echo $this->loadTemplate('batch'); 
		}
	?>
	
			<!-- Hidden Inputs -->
			<div id="hidden-inputs">
				<input type="hidden" name="task" value="" />
				<input type="hidden" name="boxchecked" value="0" />
				<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
				<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
				<input type="hidden" name="original_order_values" value="<?php echo implode($originalOrders, ','); ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</div>
</form>

</div>