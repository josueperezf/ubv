<?php
App::uses('Ubvtmv02', 'Model');

/**
 * Ubvtmv02 Test Case
 *
 */
class Ubvtmv02Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvtmv02',
		'app.ubvdtm07',
		'app.ubvmov13',
		'app.ubvdmo14',
		'app.ubvbie12',
		'app.ubvden08',
		'app.ubvcat04',
		'app.ubvdus10',
		'app.ubvuad09',
		'app.ubvper11',
		'app.ubvcar05',
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
		$this->Ubvtmv02 = ClassRegistry::init('Ubvtmv02');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvtmv02);

		parent::tearDown();
	}

}
