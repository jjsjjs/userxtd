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

include_once AKPATH_COMPONENT.'/viewitem.php' ;

/**
 * View class for a list of Userxtd.
 */
class UserxtdViewUser extends AKViewItem
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	1.6
	 */
	protected 	$text_prefix = 'COM_USERXTD';
	protected 	$items;
	protected 	$pagination;
	protected 	$state;
	
	public		$option 	= 'com_userxtd' ;
	public		$list_name 	= 'users' ;
	public		$item_name 	= 'user' ;
	public		$sort_fields ;
	
	

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$app 	= JFactory::getApplication() ;
		$user 	= JFactory::getUser() ;
		$doc 	= JFactory::getDocument();
		
		
		// Check for Access
		$id = JRequest::getVar('id') ;
		if($user->guest && !$id) {
			$uri = JFactory::getURI() ;
			$app->redirect( JRoute::_('index.php?option=com_users&view=login&return='.UXHelper::_('uri.base64', 'encode', $uri->toString())) );
			return true;
		}
		
		
		
		$this->state	= $this->get('State');
		$this->item		= $this->get('User');
		$this->params	= $this->state->get('params');
		$this->fields	= $this->get('Fields');
		$this->profiles = $this->get('Profiles');
		$this->canDo	= UserxtdHelper::getActions();
		
		$layout = $this->getLayout();
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		
		if( $layout == 'edit' ) {
			
			$this->form	= $this->get('Form');
			
			parent::displayWithPanel($tpl);
			return true ;
		}
		
		$doc->setTitle($this->item->name);
		
		
		// Dsplay Data
		// =====================================================================================
		$item = $this->item ;
		
		
		
		// Can Edit
		// =====================================================================================
		if (!$user->get('guest')) {
			$userId	= $user->get('id');
			$asset	= 'com_userxtd.user.'.$item->id;
		
			if( $item->get('id') == $userId ) {
				$this->params->set('access-edit', true);
			}
			// Now check if edit.own is available.
			elseif (!empty($userId) && $user->authorise('core.edit', 'com_user')) {
				// Check for a valid user and that they are the owner.
				$this->params->set('access-edit', true);
			}
		}
		
		
		
		// Plugins
		// =====================================================================================
		$dispatcher	= JDispatcher::getInstance();
		JPluginHelper::importPlugin('content');
		
		
		$results = $dispatcher->trigger('onUserXTDUserPrepare', array ('com_userxtd.user', &$item, &$this->params, 0));

		$item->event = new stdClass();
		$results = $dispatcher->trigger('onUserXTDUserAfterTitle', array('com_userxtd.user', &$item, &$this->params, 0));
		$item->event->afterDisplayTitle = trim(implode("\n", $results));

		$results = $dispatcher->trigger('onUserXTDUserBeforeDisplay', array('com_userxtd.user', &$item, &$this->params, 0));
		$item->event->beforeDisplayUser = trim(implode("\n", $results));

		$results = $dispatcher->trigger('onUserXTDUserAfterDisplay', array('com_userxtd.user', &$item, &$this->params, 0));
		$item->event->afterDisplayUser = trim(implode("\n", $results));
		
		
		
		// Params
		// =====================================================================================
		// Merge user params. If this is single-user view, menu params override article params
		// Otherwise, user params override menu item params
		$active	= $app->getMenu()->getActive();
		$temp	= clone ($this->params);
		$item->params = new JRegistry($item->params) ;
		
		
		// Check to see which parameters should take priority
		if ($active) {
			$currentLink = $active->link;
			
			// If the current view is the active item and an user view for this user,
			// then the menu item params take priority
			if (strpos($currentLink, 'view=user') && (strpos($currentLink, '&id='.(string) $item->id))) {
				// $item->params are the user params, $temp are the menu item params
				// Merge so that the menu item params take priority
				$item->params->merge($temp);
				
				// Load layout from active query (in case it is an alternative menu item)
				if (isset($active->query['layout'])) {
					$this->setLayout($active->query['layout']);
				}
			}else {
				// Current view is not a single user, so the user params take priority here
				// Merge the menu item params with the user params so that the user params take priority
				$temp->merge($item->params);
				$this->params = $temp;
		
				// Check for alternative layouts (since we are not in a single-user menu item)
				// Single-user menu item layout takes priority over alt layout for an user
				if ($layout = $this->params->get('user_layout')) {
					$this->setLayout($layout);
				}
			}
			
		}
		else {
			// Merge so that article params take priority
			$temp->merge($this->params);
			$this->params = $temp;
			
			// Check for alternative layouts (since we are not in a single-article menu item)
			// Single-article menu item layout takes priority over alt layout for an article
			if ($layout = $this->params->get('user_layout')) {
				$this->setLayout($layout);
			}
		}
		
		
		
		// Show params
		// =====================================================================================

		$show_cats = $this->params->get('CoreRegistration_Categories_Show') ;
		$show_cats = is_array($show_cats) ? $show_cats : array($show_cats);
		
		if(in_array('global', $show_cats)) {
			$show_cats = JComponentHelper::getParams('com_userxtd')->get('CoreRegistration_Categories_Show') ;
		}
		
		if( !in_array('*', $show_cats) ) {
			$this->params->set('show_categories', $show_cats) ;
		}else{
			$this->params->set('show_categories', '*') ;
		}
		
		
		$item->params = $this->params ;
		
		
		
		parent::display($tpl);
	}
	
	
	/**
	 * Add the page title and toolbar.
	 */
	protected function addToolbar()
	{
		AKToolBarHelper::title( 'User' . ' ' . JText::_('COM_USERXTD_TITLE_ITEM_EDIT'), 'article-add.png');

		JRequest::setVar('hidemainmenu', true);

		$user		= JFactory::getUser();
		$isNew		= ($this->item->id == 0);

		JToolBarHelper::apply($this->item_name.'.apply');
		JToolBarHelper::save($this->item_name.'.save');
		JToolBarHelper::cancel($this->item_name.'.cancel');
	}
	
	
	
	/*
	 * function handleFields
	 * @param 
	 */
	
	public function handleFields()
	{
		$form = $this->form ;
		$UserParams = JComponentHelper::getParams('com_users') ;
		
		parent::handleFields();
		
		
		// for Joomla! 3.0
		if(JVERSION >= 3) {
			
			// $form->removeField('name', 'fields');
			
		}else{
			
			// $form->removeField('name', 'fields');
			
		}
		
	}
	
	
	
	/*
	 * function showInfo
	 * @param $key
	 */
	
	public function showInfo( $item, $key = null, $label = null, $strip = true, $link = null ,$class = null)
	{
		if(empty($item->$key)){
			return false ;
		}
		
		$lang  = $strip ? substr($key, 2) : $key ;
		
		if(!$label){
			$label = JText::_('COM_{COMPONENT_NAME_UC}_'.strtoupper($lang)) ;
		}else{
			$label = JText::_(strtoupper($label)) ;
		}
		
		$value = $item->$key ;
		
		if($link){
			$value = JHtml::_('link', $link, $value);
		}
		
		$lang = str_replace( '_', '-', $lang );
		
		$info =
<<<INFO
			<dt class="info-label">{$label}:</dt>
			<dd class="info-value">{$value}</dd>
INFO;
		return $info ;
	}
}