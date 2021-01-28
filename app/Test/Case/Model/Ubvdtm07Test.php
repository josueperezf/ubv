<?php
App::uses('Ubvdtm07', 'Model');

/**
 * Ubvdtm07 Test Case
 *
 */
class Ubvdtm07Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvdtm07',
		'app.ubvtmv02',
		'app.ubvmov13'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvdtm07 = ClassRegistry::init('Ubvdtm07');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvdtm07);

		parent::tearDown();
	}

}
