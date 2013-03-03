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

include_once AKPATH_COMPONENT.'/modeladmin.php' ;

/**
 * Userxtd model.
 */
class UserxtdModelUser extends AKModelAdmin
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	1.6
	 */
	protected 	$text_prefix = 'COM_USERXTD';
	
	public 		$component = 'userxtd' ;
	public 		$item_name = 'user' ;
	public 		$list_name = 'users' ;
	
	
	/**
	 * @var		object	The user profile data.
	 * @since   1.6
	 */
	protected $data;

	/**
	 * Method to check in a user.
	 *
	 * @param   integer		The id of the row to check out.
	 * @return  boolean  True on success, false on failure.
	 * @since   1.6
	 */
	public function checkin($userId = null)
	{
		// Get the user id.
		$userId = (!empty($userId)) ? $userId : (int) $this->getState('user.id');

		if ($userId)
		{
			// Initialise the table with JUser.
			$table = JTable::getInstance('User');

			// Attempt to check the row in.
			if (!$table->checkin($userId))
			{
				$this->setError($table->getError());
				return false;
			}
		}

		return true;
	}

	/**
	 * Method to check out a user for editing.
	 *
	 * @param   integer		The id of the row to check out.
	 * @return  boolean  True on success, false on failure.
	 * @since   1.6
	 */
	public function checkout($userId = null)
	{
		// Get the user id.
		$userId = (!empty($userId)) ? $userId : (int) $this->getState('user.id');

		if ($userId)
		{
			// Initialise the table with JUser.
			$table = JTable::getInstance('User');

			// Get the current user object.
			$user = JFactory::getUser();

			// Attempt to check the row out.
			if (!$table->checkout($user->get('id'), $userId))
			{
				$this->setError($table->getError());
				return false;
			}
		}

		return true;
	}
	
	
	
	/*
	 * function getTable
	 * @param $name
	 */
	
	public function getTable($name = 'User', $prefix = 'JTable', $option = array())
	{
		return parent::getTable($name, $prefix, $option);
	}
	
	

	/**
	 * Method to get the record form.
	 *
	 * @param	array	$data		An optional array of data for the form to interogate.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	JForm	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		JForm::addFormPath(JPATH_ROOT.'/components/com_users/models/forms') ;
		$form = $this->loadForm('com_userxtd.profile', 'profile', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}
		if (!JComponentHelper::getParams('com_users')->get('change_login_name'))
		{
			$form->setFieldAttribute('username', 'class', '');
			$form->setFieldAttribute('username', 'filter', '');
			$form->setFieldAttribute('username', 'description', 'COM_USERS_PROFILE_NOCHANGE_USERNAME_DESC');
			$form->setFieldAttribute('username', 'validate', '');
			$form->setFieldAttribute('username', 'message', '');
			$form->setFieldAttribute('username', 'readonly', 'true');
			$form->setFieldAttribute('username', 'required', 'false');
		}
		
		return $form ;
	}
	
	
	/*
	 * function getFields
	 * @param 
	 */
	
	public function getFields()
	{
		$fields = array('profile');
		
		return $fields ;
	}
	
	

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		if ($this->data === null) {

			$userId = $this->getState('user.id');

			// Initialise the table with JUser.
			$this->data	= new JUser($userId);

			// Set the base user data.
			$this->data->email1 = $this->data->get('email');
			$this->data->email2 = $this->data->get('email');

			// Override the base user data with any data in the session.
			$temp = (array) JFactory::getApplication()->getUserState('com_userxtd.edit.profile.data', array());
			foreach ($temp as $k => $v)
			{
				$this->data->$k = $v;
			}

			// Unset the passwords.
			unset($this->data->password1);
			unset($this->data->password2);

			$registry = new JRegistry($this->data->params);
			$this->data->params = $registry->toArray();

			// Get the dispatcher and load the users plugins.
			$dispatcher	= JEventDispatcher::getInstance();
			JPluginHelper::importPlugin('user');

			// Trigger the data preparation event.
			$results = $dispatcher->trigger('onContentPrepareData', array('com_userxtd.profile', $this->data));

			// Check for errors encountered while preparing the data.
			if (count($results) && in_array(false, $results, true))
			{
				$this->setError($dispatcher->getError());
				$this->data = false;
			}
		}

		return $this->data;
	}

	
	
	/**
	 * Method to get a single record.
	 *
	 * @param	integer	The id of the primary key.
	 *
	 * @return	mixed	Object on success, false on failure.
	 * @since	1.6
	 */
	public function getUser($pk = null)
	{
		$id 	= JRequest::getVar('id') ;
		$id 	= $id ? $id : null ;
		
		$user 	= UXFactory::getUser($id);
		
		if($user) {
			
			
			return $user ;
		}

		return false;
	}
	
	
	
	/*
	 * function getFields
	 * @param 
	 */
	
	public function getProfiles()
	{
		$catids = $this->getState('params')->get('CoreRegistration_Categories') ;
		
		if(in_array('*', $catids)) {
			$catids = null ;
		}
		
		$fields = UXHelper::_('form.getFieldsByCategory', $catids) ;
		
		return $fields ;
	}
	
	
	
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState()
	{
		// Get the application object.
		$user_params	= JFactory::getApplication()->getParams('com_users');
		$userxtd_params	= JFactory::getApplication()->getParams('com_userxtd');
		$user_params->merge($userxtd_params);

		// Get the user id.
		$userId = JFactory::getApplication()->getUserState('com_userxtd.edit.profile.id');
		$userId = !empty($userId) ? $userId : (int) JFactory::getUser()->get('id');

		// Set the user id.
		$this->setState('user.id', $userId);

		// Load the parameters.
		$this->setState('params', $user_params);
	}
	
	
	
	/**
     * Method to allow derived classes to preprocess the form.
     *
     * @param   JForm   $form   A JForm object.
     * @param   mixed   $data   The data expected for the form.
     * @param   string  $group  The name of the plugin group to import (defaults to "content").
     *
     * @return  void 
     *
     * @see     JFormField
     * @since   11.1
     * @throws  Exception if there is an error in the form event.
     */
    protected function preprocessForm(JForm $form, $data, $group = 'content')
	{
		if (JComponentHelper::getParams('com_users')->get('frontend_userparams'))
		{
			$form->loadFile('frontend', false);
			if (JFactory::getUser()->authorise('core.login.admin'))
			{
				$form->loadFile('frontend_admin', false);
			}
		}
		
		return parent::preprocessForm($form, $data, $group);
	}
	
	
	/**
	 * Method to save the form data.
	 *
	 * @param   array  The form data.
	 * @return  mixed  	The user id on success, false on failure.
	 * @since   1.6
	 */
	public function save($data)
	{
		$userId = (!empty($data['id'])) ? $data['id'] : (int) $this->getState('user.id');

		$user = new JUser($userId);

		// Prepare the data for the user object.
		$data['email']		= $data['email1'];
		$data['password']	= $data['password1'];

		// Unset the username if it should not be overwritten
		if (!JComponentHelper::getParams('com_users')->get('change_login_name'))
		{
			unset($data['username']);
		}

		// Unset the block so it does not get overwritten
		unset($data['block']);

		// Unset the sendEmail so it does not get overwritten
		unset($data['sendEmail']);

		// Bind the data.
		if (!$user->bind($data))
		{
			$this->setError(JText::sprintf('USERS PROFILE BIND FAILED', $user->getError()));
			return false;
		}

		// Load the users plugin group.
		JPluginHelper::importPlugin('user');

		// Null the user groups so they don't get overwritten
		$user->groups = null;

		// Store the data.
		if (!$user->save())
		{
			$this->setError($user->getError());
			return false;
		}
		
		// Remove session
		$session = JFactory::getSession();
		$session->set('user', $user) ;
		
		return $user->id;
	}
	

	/**
	 * Prepare and sanitise the table prior to saving.
	 *
	 * @since	1.6
	 */
	protected function prepareTable($table)
	{
		return parent::prepareTable($table);
	}
	
}