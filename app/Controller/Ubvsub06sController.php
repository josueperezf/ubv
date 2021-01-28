<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Ubvsub06s Controller
 *
 * @property Ubvsub06 $Ubvsub06
 */
class Ubvsub06sController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ubvsub06->recursive = 0;
		$this->set('ubvsub06s', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ubvsub06->exists($id)) {
			throw new NotFoundException(__('Invalid ubvsub06'));
		}
		$options = array('conditions' => array('Ubvsub06.' . $this->Ubvsub06->primaryKey => $id));
		$this->set('ubvsub06', $this->Ubvsub06->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ubvsub06->create();
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','-','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ'));
			if ($this->Ubvsub06->save($this->request->data)) {
				$this->Session->setFlash(__('La sub-coordinacion ha sido almacenada'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un problema, por favor verifica.'));
			}
		}
		$ubvcoo03s = $this->Ubvsub06->Ubvcoo03->find('list');
		$this->set(compact('ubvcoo03s'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		
		if (!$this->Ubvsub06->exists($id)) {
			throw new NotFoundException(__('Invalid ubvsub06'));
		}
		$this->loadModel('Ubvuad09');
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','-','í','Í','ó','Ó','ú','Ú','ñ','Ñ'));
			if ($this->Ubvsub06->save($this->request->data)) {
				$this->Session->setFlash(__('La sub-coordinacion ha sido modificada'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un problema, por favor verifica.'));
			}
		} else {
			//$options = array('conditions' => array('Ubvsub06.d' => $id));
			$this->request->data = $this->Ubvsub06->find('first', array('conditions' => array('Ubvsub06.id' => $id)));
			
		}
		$cantidadbienes=$this->Ubvsub06->query('SELECT countBienSub('.$id.');');
		$ubvcoo03s = $this->Ubvsub06->Ubvcoo03->find('list');
		$this->set(compact('ubvcoo03s','cantidadbienes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ubvsub06->id = $id;
		if (!$this->Ubvsub06->exists()) {
			throw new NotFoundException(__('Invalid ubvsub06'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ubvsub06->delete()) {
			$this->Session->setFlash(__('Ubvsub06 deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ubvsub06 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function validar_nombre()
	{

			$control='';
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ'));
			$this->Ubvsub06->set($this->request->data);
			//$control=$this->Ubvbie12->invalidFields();
			$control=$this->Ubvsub06->validates(array('fieldList' => array('nombre', 'isUnique')));
			$this->set('control',$control);
			$this->layout='ajax';
	}
	public function listSub()
	{
		$this->set('ubvsub06s2',$this->Ubvsub06->find('list',array('conditions'=>array('estatus'=>'1'))));
		$this->layout='ajax';
	}
}
