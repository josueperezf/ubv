<?php
App::uses('Ubvdus10', 'Model');

/**
 * Ubvdus10 Test Case
 *
 */
class Ubvdus10Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvdus10',
		'app.ubvuad09',
		'app.ubvbie12',
		'app.ubvden08',
		'app.ubvcat04',
		'app.ubvmar01',
		'app.ubvdmo14',
		'app.ubvmov13',
		'app.ubvper11',
		'app.ubvdus10s_ubvmov13'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvdus10 = ClassRegistry::init('Ubvdus10');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvdus10);

		parent::tearDown();
	}

}
