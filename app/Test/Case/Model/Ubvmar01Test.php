<?php
App::uses('Ubvmar01', 'Model');

/**
 * Ubvmar01 Test Case
 *
 */
class Ubvmar01Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvmar01',
		'app.ubvbie12',
		'app.ubvden08',
		'app.ubvcat04',
		'app.ubvdus10',
		'app.ubvuad09',
		'app.ubvper11',
		'app.ubvmov13',
		'app.ubvdus10s_ubvmov13',
		'app.ubvdmo14'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvmar01 = ClassRegistry::init('Ubvmar01');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvmar01);

		parent::tearDown();
	}

}
