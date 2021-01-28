<?php
App::uses('Ubvuad09', 'Model');

/**
 * Ubvuad09 Test Case
 *
 */
class Ubvuad09Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvuad09',
		'app.ubvtua15',
		'app.ubvsub06',
		'app.ubvcoo03',
		'app.ubvdus10',
		'app.ubvbie12',
		'app.ubvden08',
		'app.ubvcat04',
		'app.ubvmar01',
		'app.ubvdmo14',
		'app.ubvmov13',
		'app.ubvdtm07',
		'app.ubvtmv02',
		'app.ubvdus10s_ubvmov13',
		'app.ubvper11',
		'app.ubvcar05'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvuad09 = ClassRegistry::init('Ubvuad09');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvuad09);

		parent::tearDown();
	}

}
