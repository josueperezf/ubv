<?php
App::uses('Ubvdus10sUbvmov13', 'Model');

/**
 * Ubvdus10sUbvmov13 Test Case
 *
 */
class Ubvdus10sUbvmov13Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvdus10s_ubvmov13',
		'app.ubvdus10',
		'app.ubvuad09',
		'app.ubvbie12',
		'app.ubvden08',
		'app.ubvcat04',
		'app.ubvmar01',
		'app.ubvdmo14',
		'app.ubvmov13',
		'app.ubvper11'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvdus10sUbvmov13 = ClassRegistry::init('Ubvdus10sUbvmov13');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvdus10sUbvmov13);

		parent::tearDown();
	}

}
