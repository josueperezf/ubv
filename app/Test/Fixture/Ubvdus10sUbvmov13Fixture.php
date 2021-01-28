<?php
/**
 * Ubvdus10sUbvmov13Fixture
 *
 */
class Ubvdus10sUbvmov13Fixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ubvdus10_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'ubvmov13_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'tipo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('ubvdus10_id', 'ubvmov13_id'), 'unique' => 1),
			'ubvdus10s_ubvmov13s_FKIndex1' => array('column' => 'ubvdus10_id', 'unique' => 0),
			'ubvdus10s_ubvmov13s_FKIndex2' => array('column' => 'ubvmov13_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'ubvdus10_id' => 1,
			'ubvmov13_id' => 1,
			'tipo' => 'Lorem ipsum dolor sit ame'
		),
	);

}
