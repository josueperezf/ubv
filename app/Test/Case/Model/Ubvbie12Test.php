<?php
App::uses('Ubvbie12', 'Model');

/**
 * Ubvbie12 Test Case
 *
 */
class Ubvbie12Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvbie12',
		'app.ubvden08',
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
		$this->Ubvbie12 = ClassRegistry::init('Ubvbie12');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvbie12);

		parent::tearDown();
	}

}
