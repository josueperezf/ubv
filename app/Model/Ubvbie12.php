<?php
App::uses('AppModel', 'Model');
/**
 * Ubvbie12 Model
 *
 * @property Ubvden08 $Ubvden08
 * @property Ubvdus10 $Ubvdus10
 * @property Ubvmar01 $Ubvmar01
 * @property Ubvdmo14 $Ubvdmo14
 */
class Ubvbie12 extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

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
		'ubvden08_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ubvdus10_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ubvmar01_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),								
		'codigo'=>array(
			'codigo'=>array(
					'rule'=>'notempty',
					'message'=>'el codigo es obligatorio')),
		'codigo'=>array(
			'isUnique'=>array(
					'rule'=>'isUnique',
					'message'=>'el codigo no puede estar repetido')),
		'monto' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ubvden08' => array(
			'className' => 'Ubvden08',
			'foreignKey' => 'ubvden08_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ubvdus10' => array(
			'className' => 'Ubvdus10',
			'foreignKey' => 'ubvdus10_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ubvmar01' => array(
			'className' => 'Ubvmar01',
			'foreignKey' => 'ubvmar01_id',
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
		'Ubvdmo14' => array(
			'className' => 'Ubvdmo14',
			'foreignKey' => 'ubvbie12_id',
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
	public function afterSave()
	{
		parent::afterSave(); 
		//$id = $this->getLastInsertID(); 
		$id=$this->query('SELECT id FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
		$id=$id[0]['ubvbit16s']['id'];
		App::uses('CakeSession', 'Model/Datasource');
        $username = CakeSession::read('Auth.User.username');
		$user_id = CakeSession::read('Auth.User.id');
		//debug($username);
    	$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $id";
		//debug($sql);
		$this->query($sql);
		return true;
		
	}

}
