<?php
App::uses('Ubvmov13', 'Model');

/**
 * Ubvmov13 Test Case
 *
 */
class Ubvmov13Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvmov13',
		'app.ubvdtm07',
		'app.ubvtmv02',
		'app.ubvdmo14',
		'app.ubvbie12',
		'app.ubvden08',
		'app.ubvcat04',
		'app.ubvdus10',
		'app.ubvuad09',
		'app.ubvper11',
		'app.ubvdus10s_ubvmov13',
		'app.ubvmar01'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvmov13 = ClassRegistry::init('Ubvmov13');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvmov13);

		parent::tearDown();
	}

}
