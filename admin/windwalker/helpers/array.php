<?php
/**
 * @package     Windwalker.Framework
 * @subpackage  AKHelper
 *
 * @copyright   Copyright (C) 2012 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Generated by AKHelper - http://asikart.com
 */


// No direct access
defined('_JEXEC') or die;


class AKHelperArray {
	
	
	/*
	 * Pivot Array, separate by key.
	 * 
	 * From:
	 * 
	 * 		[value] => Array
	 * 			(
	 * 				[0] => aaa
	 * 				[1] => bbb
	 * 			)
	 * 	
	 * 		[text] => Array
	 * 			(
	 * 				[0] => aaa
	 * 				[1] => bbb
	 * 			)
	 * 	
	 *
	 *  To:
	 *
	 * 	[0] => Array
	 * 		(
	 * 			[value] => aaa
	 * 			[text] => aaa
	 * 		)
	 * 
	 * 	[1] => Array
	 * 		(
	 * 			[value] => bbb
	 * 			[text] => bbb
	 * 		)
	 * @param $array
	 */
	
	public static function pivotByKey($array)
	{
		$array 	= (array) $array ;
		$new	= array();
		$keys 	= array_keys($array) ;
		
		foreach( $keys as $k => $val ):
			
			foreach( (array) $array[$val] as $k2 => $v2 ):
				
				$new[$k2][$val] = $v2 ;
				
			endforeach;
			 
		endforeach;
		
		return $new ;
	}
	
	
	
	/*
	 * function combineByKey
	 *
	 * 
	 * From:
	 *  [0] => Array
	 * 		(
	 * 			[value] => aaa
	 * 			[text] => aaa
	 * 		)
	 * 
	 * 	[1] => Array
	 * 		(
	 * 			[value] => bbb
	 * 			[text] => bbb
	 * 		)
	 * 
	 *  To:
	 *
	 * 		[value] => Array
	 * 			(
	 * 				[0] => aaa
	 * 				[1] => bbb
	 * 			)
	 * 	
	 * 		[text] => Array
	 * 			(
	 * 				[0] => aaa
	 * 				[1] => bbb
	 * 			)
	 * 
	 * @param $array
	 */
	
	public static function pivotBySort($array)
	{
		$array 	= (array) $array ;
		$new	= array();
		
		$array2 = $array ;
		$first	= array_shift($array2) ;

		foreach( $array as $k => $v ):
			
			foreach( (array) $first as $k2 => $v2 ):
				
				$new[$k2][$k] = $array[$k][$k2] ;
				
			endforeach;
			
		endforeach;
		
		return $new ;
	}
	
	
	
	/*
	 * function pivotParams
	 * @param $params
	 */
	
	public static function pivotParamsFromArray($array)
	{
		
	}
}


