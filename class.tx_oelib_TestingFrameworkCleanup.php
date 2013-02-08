<?php
/***************************************************************
* Copyright notice
*
* (c) 2010-2013 Oliver Klee <typo3-coding@oliverklee.de>
* All rights reserved
*
* This script is part of the TYPO3 project. The TYPO3 project is
* free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* The GNU General Public License can be found at
* http://www.gnu.org/copyleft/gpl.html.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * This class takes care of cleaning up oelib after the testing framework.
 *
 * @package TYPO3
 * @subpackage tx_oelib
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class tx_oelib_TestingFrameworkCleanup {
	/**
	 * Cleans up oelib after running a test.
	 *
	 * @return void
	 */
	public function cleanUp() {
		tx_oelib_configurationProxy::purgeInstances();
		tx_oelib_BackEndLoginManager::purgeInstance();
		tx_oelib_ConfigurationRegistry::purgeInstance();
		tx_oelib_FrontEndLoginManager::purgeInstance();
		tx_oelib_Geocoding_Google::purgeInstance();
		tx_oelib_headerProxyFactory::purgeInstance();
		tx_oelib_mailerFactory::purgeInstance();
		tx_oelib_MapperRegistry::purgeInstance();
		tx_oelib_PageFinder::purgeInstance();
		tx_oelib_Session::purgeInstances();
		tx_oelib_templatehelper::purgeCachedConfigurations();
		tx_oelib_Timer::purgeInstance();
		tx_oelib_TranslatorRegistry::purgeInstance();
	}
}

if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/oelib/class.tx_oelib_TestingFrameworkCleanup.php']) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/oelib/class.tx_oelib_TestingFrameworkCleanup.php']);
}
?>