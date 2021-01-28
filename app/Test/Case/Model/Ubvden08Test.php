<?php
App::uses('Ubvden08', 'Model');

/**
 * Ubvden08 Test Case
 *
 */
class Ubvden08Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvden08',
		'app.ubvcat04',
		'app.ubvbie12',
		'app.ubvdus10',
		'app.ubvmar01',
		'app.ubvdmo14'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvden08 = ClassRegistry::init('Ubvden08');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvden08);

		parent::tearDown();
	}

}
