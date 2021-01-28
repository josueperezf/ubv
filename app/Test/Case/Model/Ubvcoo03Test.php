<?php
App::uses('Ubvcoo03', 'Model');

/**
 * Ubvcoo03 Test Case
 *
 */
class Ubvcoo03Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvcoo03',
		'app.ubvsub06'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvcoo03 = ClassRegistry::init('Ubvcoo03');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvcoo03);

		parent::tearDown();
	}

}
