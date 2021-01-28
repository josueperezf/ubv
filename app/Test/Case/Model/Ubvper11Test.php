<?php
App::uses('Ubvper11', 'Model');

/**
 * Ubvper11 Test Case
 *
 */
class Ubvper11Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvper11',
		'app.ubvcar05',
		'app.ubvdus10',
		'app.ubvuad09',
		'app.ubvbie12',
		'app.ubvden08',
		'app.ubvcat04',
		'app.ubvmar01',
		'app.ubvdmo14',
		'app.ubvmov13',
		'app.ubvdtm07',
		'app.ubvtmv02',
		'app.ubvdus10s_ubvmov13'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvper11 = ClassRegistry::init('Ubvper11');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvper11);

		parent::tearDown();
	}

}
