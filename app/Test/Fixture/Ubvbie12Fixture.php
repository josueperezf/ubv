<?php
/**
 * Ubvbie12Fixture
 *
 */
class Ubvbie12Fixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'ubvden08_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'ubvdus10_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'ubvmar01_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'codigo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'serial' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'monto' => array('type' => 'float', 'null' => true, 'default' => null),
		'descripcion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 70, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'ubvbie12s_FKIndex1' => array('column' => 'ubvmar01_id', 'unique' => 0),
			'ubvbie12s_FKIndex2' => array('column' => 'ubvdus10_id', 'unique' => 0),
			'ubvbie12s_FKIndex3' => array('column' => 'ubvden08_id', 'unique' => 0)
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
			'ubvden08_id' => 1,
			'ubvdus10_id' => 1,
			'ubvmar01_id' => 1,
			'codigo' => 'Lorem ipsum dolor ',
			'serial' => 'Lorem ipsum dolor ',
			'monto' => 1,
			'descripcion' => 'Lorem ipsum dolor sit amet'
		),
	);

}
