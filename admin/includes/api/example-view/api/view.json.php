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


jimport('joomla.application.component.view');

if(!class_exists('AKViewApi')){
	userxtdLoader('admin://includes/api/api.init');
}

/**
 * View to edit
 */
class UserxtdViewApi extends AKViewApi
{
	protected $state;
	protected $item;
	protected $form;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		parent::display($tpl);
	}


}
