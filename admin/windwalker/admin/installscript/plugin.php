<?php
/**
 * @package     Windwalker.Framework
 * @subpackage  script
 *
 * @copyright   Copyright (C) 2012 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Generated by AKHelper - http://asikart.com
 */

// no direct access
defined('_JEXEC') or die;

// Set component install success info
$grid->addRow(array( 'class' => 'row'.($i % 2) )) ;
$grid->setRowCell('num', ++$i , $td_class);
$grid->setRowCell('type', JText::_('COM_INSTALLER_TYPE_PLUGIN') , $td_class);
$grid->setRowCell('name', JText::_(strtoupper($manifest->name)) , array());
$grid->setRowCell('version', $manifest->version , $td_class);
$grid->setRowCell('state', $tick , $td_class);
$grid->setRowCell('info', '', array());
