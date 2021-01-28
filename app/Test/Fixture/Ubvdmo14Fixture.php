<?php
/**
 * Ubvdmo14Fixture
 *
 */
class Ubvdmo14Fixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'ubvmov13_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'ubvbie12_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'ubvdmo14s_FKIndex1' => array('column' => 'ubvbie12_id', 'unique' => 0),
			'ubvdmo14s_FKIndex2' => array('column' => 'ubvmov13_id', 'unique' => 0)
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
			'id' => 1,
			'ubvmov13_id' => 1,
			'ubvbie12_id' => 1
		),
	);

}
