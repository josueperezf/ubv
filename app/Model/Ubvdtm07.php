<?php
App::uses('AppModel', 'Model');
/**
 * Ubvdtm07 Model
 *
 * @property Ubvtmv02 $Ubvtmv02
 * @property Ubvmov13 $Ubvmov13
 */
class Ubvdtm07 extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ubvtmv02_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ubvtmv02_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ubvtmv02' => array(
			'className' => 'Ubvtmv02',
			'foreignKey' => 'ubvtmv02_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ubvmov13' => array(
			'className' => 'Ubvmov13',
			'foreignKey' => 'ubvdtm07_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
