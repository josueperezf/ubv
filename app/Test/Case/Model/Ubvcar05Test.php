<?php
App::uses('Ubvcar05', 'Model');

/**
 * Ubvcar05 Test Case
 *
 */
class Ubvcar05Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ubvcar05',
		'app.ubvper11'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ubvcar05 = ClassRegistry::init('Ubvcar05');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ubvcar05);

		parent::tearDown();
	}

}
