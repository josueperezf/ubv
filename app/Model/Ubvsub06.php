<?php
App::uses('AppModel', 'Model');
/**
 * Ubvsub06 Model
 *
 * @property Ubvcoo03 $Ubvcoo03
 * @property Ubvuad09 $Ubvuad09
 */
class Ubvsub06 extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ciudad';

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
		'ubvcoo03_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ciudad' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El nombre de La ciudad es obligatorio',
			),
		),
		'nombre'=>array(
			'nombre'=>array(
							'rule'=>'notempty',
							'message'=>'El nombre es requerido')),
		'nombre'=>array(
			'isUnique'=>array(
					'rule'=>'isUnique',
					'message'=>'Ya existe un campo con las mismas caracteristicas')),
		'direccion'=>array(
			'direccion'=>array(
							'rule'=>'notempty',
							'message'=>'La direccion es requerida')),
		'estatus'=>array(
			'estatus'=>array(
							'rule'=>'notempty'
							))
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ubvcoo03' => array(
			'className' => 'Ubvcoo03',
			'foreignKey' => 'ubvcoo03_id',
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
		'Ubvuad09' => array(
			'className' => 'Ubvuad09',
			'foreignKey' => 'ubvsub06_id',
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
