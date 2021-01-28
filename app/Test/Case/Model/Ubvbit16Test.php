<?php
App::uses('Ubvbit16', 'Model');

/**
 * Ubvbit16 Test Case
 *
 */
class Ubvbit16Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvbit16'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvbit16 = ClassRegistry::init('Ubvbit16');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvbit16);

		parent::tearDown();
	}

}
