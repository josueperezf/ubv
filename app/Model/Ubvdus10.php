<?php
App::uses('AppModel', 'Model');
/**
 * Ubvdus10 Model
 *
 * @property Ubvuad09 $Ubvuad09
 * @property Ubvbie12 $Ubvbie12
 * @property Ubvper11 $Ubvper11
 * @property Ubvmov13 $Ubvmov13
 */
class Ubvdus10 extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ubvuad09_id';

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
		'ubvuad09_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estatus'=>array(
			'estatus'=>array(
						'rule' => array('notempty'),
						'message'=>'No puede estar vacio'))
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ubvuad09' => array(
			'className' => 'Ubvuad09',
			'foreignKey' => 'ubvuad09_id',
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
		'Ubvbie12' => array(
			'className' => 'Ubvbie12',
			'foreignKey' => 'ubvdus10_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Ubvper11' => array(
			'className' => 'Ubvper11',
			'foreignKey' => 'ubvdus10_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Ubvmov13' => array(
			'className' => 'Ubvmov13',
			'joinTable' => 'ubvdus10s_ubvmov13s',
			'foreignKey' => 'ubvdus10_id',
			'associationForeignKey' => 'ubvmov13_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
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
