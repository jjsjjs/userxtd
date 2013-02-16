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


/**
 * Userxtd helper.
 */
class UserxtdHelperForm
{
	/*
	 * function getFieldsByCategory
	 * @param $catid
	 */
	
	public static function getFieldsByCategory($catid = array(), $form = null)
	{
		if(!$catid || count($catid) == 0) {
			return self::getFields(null, $form);
		}
		
		if(is_string($catid)) {
			$catid = array($catid) ;
		}
		
		$catid = implode(',', $catid);
		
		return self::getFields("catid IN ({$catid})", $form);
	}
	
	
	/*
	 * function getFields
	 * @param $condition
	 */
	
	public static function getFields($condition = null, $form = null, $name = 'UserXTD')
	{
		
		if(!$form) {
			$form = new JForm($name);
		}
		
		$app = JFactory::getApplication() ;
		$db = JFactory::getDbo();
		$q 	= $db->getQuery(true) ;
		
		
		if($condition) {
			$q->where($condition) ;
		}
		
		
		// Get FormFields
		// ============================================================================
		$tables = array(
			'a' => '#__userxtd_fields',
			'b' => '#__categories'
		);
		$select = UXHelper::_('db.getSelectList', $tables) ;
		
		$q->select($select)
			->from("#__userxtd_fields AS a")
			->join('LEFT', '#__categories AS b ON a.catid = b.id' )
			->where('a.published > 0')
			->order("a.ordering")
			;
		
		$db->setQuery($q);
		$fields = $db->loadObjectList('a_id');
		
		
		
		// Separate Categories
		// ============================================================================
		$field_groups = array();
		foreach( $fields as $key => $field ):
			
			// init array
			if(!isset($field_groups[$field->a_catid])){
				$field_groups[$field->a_catid] = array();
			}
			
			$field_groups[$field->a_catid][] = $field ;
		endforeach;
		
		
		
		// Build Form
		// ============================================================================
		foreach( $field_groups as $group ):
			$elements = array();
			foreach( $group as &$field ):
				$elements[] = UXHelper::_('fields.buildElement', $field->a_field_type, $field->a_attrs );
			endforeach;
			
			$elements = implode("\n", $elements);
			$elements = UXHelper::_('fields.buildFormXML', $elements, 'userxtd-cat-'.$group[0]->a_catid, 'profile', $group[0]->b_title );
			
			$field_list = JArrayHelper::getColumn($group, 'name');
			$form->load($elements, false);
		endforeach;
		
		return $form ;
	}
}

