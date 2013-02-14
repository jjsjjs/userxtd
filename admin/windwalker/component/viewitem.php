<?php
/**
 * @package     Windwalker.Framework
 * @subpackage  class
 *
 * @copyright   Copyright (C) 2012 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Generated by AKHelper - http://asikart.com
 */

// no direct access
defined('_JEXEC') or die;


include_once dirname(__FILE__).'/view.php' ;

class AKViewItem extends AKView
{
	protected 	$items ;
	protected 	$pagination ;
	protected 	$state ;
	
	public		$option  ;
	public		$list_name  ;
	public		$item_name  ;
	
	
	/**
	 * Display the view
	 */
	public function displayWithPanel($tpl = null)
	{
		$app = JFactory::getApplication() ;
		
		$this->addToolbar();
		$this->handleFields();
		
		// if is frontend, show toolbar
		if($app->isAdmin())	{
			parent::display($tpl);
		}else{
			parent::displayWithPanel($tpl);
		}
	}

	
	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		JRequest::setVar('hidemainmenu', true);

		$user		= JFactory::getUser();
		$isNew		= ($this->item->id == 0);

		JToolBarHelper::apply($this->item_name.'.apply');
		JToolBarHelper::save($this->item_name.'.save');
		JToolBarHelper::custom($this->item_name.'.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
		JToolBarHelper::custom($this->item_name.'.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
		JToolBarHelper::cancel($this->item_name.'.cancel');
	}
	
	
	
	/*
	 * function handleFields
	 * @param 
	 */
	
	public function handleFields()
	{
		$form = $this->form ;
		
		// Nested item, hide parent_id.
		if(!$this->state->get('item.nested')){
			$form->removeField('parent_id', 'basic');
		}
		
	}
}