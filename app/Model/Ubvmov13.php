<?php
App::uses('AppModel', 'Model');
/**
 * Ubvmov13 Model
 *
 * @property Ubvdtm07 $Ubvdtm07
 * @property Ubvdmo14 $Ubvdmo14
 * @property Ubvdus10 $Ubvdus10
 */
class Ubvmov13 extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ubvdtm07_id';

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
		'ubvdtm07_id' => array(
			'date' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha'=>array(
			'fecha'=>array(
				'rule'=>'notempty',
				'message'=>'La fecha es obligatoria')),
		'Ubvdus10'=>array(
			'Ubvdus10'=>array(
				'rule'=>'notempty',
				'message'=>'La dependencia usuaria es obligatoria')),
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ubvdtm07' => array(
			'className' => 'Ubvdtm07',
			'foreignKey' => 'ubvdtm07_id',
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
			'foreignKey' => 'ubvmov13_id',
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
		'Ubvdus10' => array(
			'className' => 'Ubvdus10',
			'joinTable' => 'ubvdus10s_ubvmov13s',
			'foreignKey' => 'ubvmov13_id',
			'associationForeignKey' => 'ubvdus10_id',
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
