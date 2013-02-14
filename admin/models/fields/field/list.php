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

include_once JPATH_ADMINISTRATOR.'/components/com_userxtd/includes/core.php' ;
JForm::addFieldPath( AKPATH_FORM.'/fields');
JFormHelper::loadFieldClass('itemlist');

/**
 * Supports an HTML select list of categories
 */
class JFormFieldField_List extends JFormFieldItemlist
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	public $type = 'Field_List';
	
	public $value ;
	
	public $name ;
	
	
	protected $view_list = 'fields' ;
	
	protected $view_item = 'field' ;
	
	protected $extension = 'com_userxtd' ;
}