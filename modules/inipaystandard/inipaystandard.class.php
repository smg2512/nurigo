<?php

/**
 * @class  inipaystandard
 * @author CONORY (http://www.conory.com)
 * @brief The parent class of the inipaystandard module
 */
class inipaystandard extends ModuleObject
{
	/**
	 * @brief install module
	 */
	function moduleInstall()
	{
		$oModuleModel = getModel('module');
		$oModuleController = getController('module');

		return new Object();
	}

	/**
	 * @brief update check.
	 */
	function checkUpdate()
	{
		$oDB = DB::getInstance();
		$oModuleModel = getModel('module');

		if(!$oModuleModel->getTrigger('moduleHandler.init', 'inipaystandard', 'controller', 'triggerModuleHandler', 'before'))
		{
			return true;
		}
		if(!$oModuleModel->getTrigger('epay.getPgModules', 'inipaystandard', 'model', 'triggerGetPgModules', 'before'))
		{
			return true;
		}

		return false;
	}

	/**
	 * @brief module update
	 */
	function moduleUpdate()
	{
		$oDB = DB::getInstance();
		$oModuleModel = getModel('module');
		$oModuleController = getController('module');

		if(!$oModuleModel->getTrigger('epay.getPgModules', 'inipaystandard', 'model', 'triggerGetPgModules', 'before'))
		{
			$oModuleController->insertTrigger('epay.getPgModules', 'inipaystandard', 'model', 'triggerGetPgModules', 'before');
		}

		if(!$oModuleModel->getTrigger('moduleHandler.init', 'inipaystandard', 'controller', 'triggerModuleHandler', 'before'))
		{
			$oModuleController->insertTrigger('moduleHandler.init', 'inipaystandard', 'controller', 'triggerModuleHandler', 'before');
		}

		return new Object(0, 'success_updated');
	}

	/**
	 * @brief Uninstall module
	 */
	function moduleUninstall()
	{
		return new Object();
	}

	/**
	 * @brief cache file recompile.
	 */
	function recompileCache()
	{

	}
}