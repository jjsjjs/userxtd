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

include_once dirname(__FILE__).'/../includes/core.php' ;


class UserxtdHelperFieldshow
{
	/*
	 * function showImage
	 * @param $value
	 */
	
	public static function showImage($value)
	{
		if($value) {
			$value = AKHelper::_('thumb.resize', $value, 300, 300);
			return JHtml::image($value, 'UserXTD image') ;
		}
	}
}