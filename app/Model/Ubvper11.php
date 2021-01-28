<?php
App::uses('AppModel', 'Model');
/**
 * Ubvper11 Model
 *
 * @property Ubvcar05 $Ubvcar05
 * @property Ubvdus10 $Ubvdus10
 */
class Ubvper11 extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'cedula';

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
		'ubvcar05_id' => array(
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
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cedula' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cedula'=>array(
			'isUnique'=>array(
					'rule'=>'isUnique',
					'message'=>'Ya existe un campo con las mismas caracteristicas')),
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
		'telefono' => array(
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
						'rule'=>'notempty'))
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ubvcar05' => array(
			'className' => 'Ubvcar05',
			'foreignKey' => 'ubvcar05_id',
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
		)
	);
	
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'ubvper11_id',
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
