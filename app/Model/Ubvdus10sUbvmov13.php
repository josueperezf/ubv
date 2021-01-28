<?php
App::uses('AppModel', 'Model');
/**
 * Ubvdus10sUbvmov13 Model
 *
 * @property Ubvdus10 $Ubvdus10
 * @property Ubvmov13 $Ubvmov13
 */
class Ubvdus10sUbvmov13 extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ubvdus10_id, ubvmov13_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ubvdus10_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'ubvmov13_id' => array(
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
		'Ubvdus10' => array(
			'className' => 'Ubvdus10',
			'foreignKey' => 'ubvdus10_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ubvmov13' => array(
			'className' => 'Ubvmov13',
			'foreignKey' => 'ubvmov13_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
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
