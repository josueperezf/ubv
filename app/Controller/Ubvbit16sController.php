<?php
App::uses('AppController', 'Controller');
/**
 * Ubvbit16s Controller
 *
 * @property Ubvbit16 $Ubvbit16
 */
class Ubvbit16sController extends AppController {
public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Ubvbit16.id' => 'desc'
        )
    );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$user = $this->Session->read('Auth.User');
		//debug();
		if($user==null)
		{
			$this->redirect(array('controller'=>'users','action' => 'login'));
		}else
		{
			if($user['group_id']!=1)
				$this->redirect(array('action' => 'ayuda'));
			else
			{
				$this->Ubvbit16->recursive = 0;
				$this->set('ubvbit16s', $this->paginate());
			}
		}
	}
	
	public function ayuda()
	{
		$user = $this->Session->read('Auth.User');
		if($user==null)
			$this->redirect(array('controller'=>'users','action' => 'login'));
	}

	public function beforeFilter() {
    	parent::beforeFilter();
		$this->Auth->allow('index','ayuda');
	}
}
