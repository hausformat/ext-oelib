<?php
/***************************************************************
* Copyright notice
*
* (c) 2008 Niels Pardon (mail@niels-pardon.de)
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

require_once(t3lib_extMgm::extPath('oelib') . 'class.tx_oelib_TemplateRegistry.php');

/**
 * Testcase for the tx_oelib_TemplateRegistry class in the 'oelib' extension.
 *
 * @package TYPO3
 * @subpackage tx_oelib
 *
 * @author Niels Pardon <mail@niels-pardon.de>
 */
class tx_oelib_TemplateRegistry_testcase extends tx_phpunit_testcase {
	public function setUp() {
	}

	public function tearDown() {
		tx_oelib_TemplateRegistry::purgeInstance();
	}


	////////////////////////////////////////////
	// Tests concerning the Singleton property
	////////////////////////////////////////////

	public function testGetInstanceReturnsTemplateRegistryInstance() {
		$this->assertTrue(
			tx_oelib_TemplateRegistry::getInstance()
				instanceof tx_oelib_TemplateRegistry
		);
	}

	public function testGetInstanceTwoTimesReturnsSameInstance() {
		$this->assertSame(
			tx_oelib_TemplateRegistry::getInstance(),
			tx_oelib_TemplateRegistry::getInstance()
		);
	}

	public function testGetInstanceAfterPurgeInstanceReturnsNewInstance() {
		$firstInstance = tx_oelib_TemplateRegistry::getInstance();
		tx_oelib_TemplateRegistry::purgeInstance();

		$this->assertNotSame(
			$firstInstance,
			tx_oelib_TemplateRegistry::getInstance()
		);
	}


	///////////////////////////
	// Tests concerning get()
	///////////////////////////

	public function testGetForEmptyTemplateFileNameReturnsTemplateInstance() {
		$this->assertTrue(
			tx_oelib_TemplateRegistry::get('') instanceof tx_oelib_template
		);
	}

	public function testGetForExistingTemplateFileNameReturnsTemplate() {
		$this->assertTrue(
			tx_oelib_TemplateRegistry::get('EXT:oelib/tests/fixtures/oelib.html')
				instanceof tx_oelib_template
		);
	}

	public function testGetForExistingTemplateFileNameCalledTwoTimesReturnsTheSameInstance() {
		$this->assertSame(
			tx_oelib_TemplateRegistry::get('EXT:oelib/tests/fixtures/oelib.html'),
			tx_oelib_TemplateRegistry::get('EXT:oelib/tests/fixtures/oelib.html')
		);
	}
}
?>