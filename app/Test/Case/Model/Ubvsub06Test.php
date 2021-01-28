<?php
App::uses('Ubvsub06', 'Model');

/**
 * Ubvsub06 Test Case
 *
 */
class Ubvsub06Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvsub06',
		'app.ubvcoo03',
		'app.ubvuad09'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvsub06 = ClassRegistry::init('Ubvsub06');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvsub06);

		parent::tearDown();
	}

}
