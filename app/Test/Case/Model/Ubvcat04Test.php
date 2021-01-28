<?php
App::uses('Ubvcat04', 'Model');

/**
 * Ubvcat04 Test Case
 *
 */
class Ubvcat04Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvcat04',
		'app.ubvden08'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvcat04 = ClassRegistry::init('Ubvcat04');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvcat04);

		parent::tearDown();
	}

}
