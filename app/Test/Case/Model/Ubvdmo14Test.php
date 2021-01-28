<?php
App::uses('Ubvdmo14', 'Model');

/**
 * Ubvdmo14 Test Case
 *
 */
class Ubvdmo14Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvdmo14',
		'app.ubvmov13',
		'app.ubvbie12',
		'app.ubvden08',
		'app.ubvcat04',
		'app.ubvdus10',
		'app.ubvmar01'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvdmo14 = ClassRegistry::init('Ubvdmo14');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvdmo14);

		parent::tearDown();
	}

}
