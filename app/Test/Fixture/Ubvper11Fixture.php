<?php
/**
 * Ubvper11Fixture
 *
 */
class Ubvper11Fixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'ubvcar05_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'ubvdus10_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'cedula' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'telefono' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 12, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'estatus' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'ubvper11s_FKIndex1' => array('column' => 'ubvdus10_id', 'unique' => 0),
			'ubvper11s_FKIndex2' => array('column' => 'ubvcar05_id', 'unique' => 0)
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
			'ubvcar05_id' => 1,
			'ubvdus10_id' => 1,
			'cedula' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'telefono' => 'Lorem ipsu',
			'estatus' => 'Lorem ipsum dolor sit ame'
		),
	);

}
