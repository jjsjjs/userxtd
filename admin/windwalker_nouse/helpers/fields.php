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


class AKHelperFields
{
	/*
	 * function buildElement
	 * @param 
	 */
	
	public static function buildElement($attrs = null, $option = array())
	{
		$node_name = $option['node_name'] ? $option['node_name'] : 'field' ;

		if(!is_array($attrs)){
			$attrs = JRequest::getVar('attrs') ;
		}
		
		if(!is_array($attrs)) {
			return '<'.$node_name.'/>' ;
		}
		
		
		// Rebuild options
		$new_options = array();
		foreach( $attrs['options']['value'] as $key => $option ):
			$new_options[$key]['value'] = $attrs['options']['value'][$key] ;
			$new_options[$key]['text'] = $attrs['options']['text'][$key] ;
		endforeach;
		$attrs['options'] = $new_options ;
		
		
		$element = '' ;
		$options = array();
		
		foreach( $attrs as $key => $attr ):
			if($key == 'options' && is_array($attr)) {
				
				// Bulid options
				foreach( $attr as $key => $opt ):
					if(!trim($opt['value'])) continue;
					$value 	= addslashes( trim($opt['value']) );
					$text	= addslashes( trim($opt['text']) );
					$options[] = "\t<option value=\"{$value}\">{$text}</option>\n" ;
				endforeach;
				
			}else{
				// Build attributes
				if(!trim($attr)) continue;
				$attr = trim($attr) ;
				$attr = addslashes($attr) ;
				$element .= "\t{$key}=\"{$attr}\"\n" ;
			}
		endforeach;
		
		// Build Element
		if(count($options) < 0){
			$element = "<{$node_name}\n{$element}/>" ;
		}else{
			$options = implode('', $options) ;
			$element = "<{$node_name}\n{$element}>\n{$options}</{$node_name}>" ;
		}
		
		
		return $element;
	}
	
	
	
	/*
	 * function parseElement
	 * @param $element
	 */
	
	public static function parseElement($element)
	{
		if(!$element) return false;
		
		$xml = JFactory::getXML($element, false);
		$attrs = $xml->attributes();
		
		$array = array();
		
		foreach( $attrs as $key => $attr ):
			$array[$key] = (string)$attr ;
		endforeach;
		
		$options = $xml->option ;
		
		if($options) {
			$i = 0 ;
			foreach( $options as $key => $option ):
				$array['options'][$i]['text'] = (string)$option ;
				$array['options'][$i]['value'] = (string)$option['value'] ;
				$i++;
			endforeach;
		}
		
		return $array;
	}
}