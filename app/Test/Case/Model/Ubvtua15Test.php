<?php
App::uses('Ubvtua15', 'Model');

/**
 * Ubvtua15 Test Case
 *
 */
class Ubvtua15Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvtua15',
		'app.ubvuad09'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvtua15 = ClassRegistry::init('Ubvtua15');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvtua15);

		parent::tearDown();
	}

}
