<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Ubvper11s Controller
 *
 * @property Ubvper11 $Ubvper11
 */
class Ubvper11sController extends AppController {
public $helpers=array('js','html','form');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ubvper11->recursive = 0;
		$this->set('ubvper11s', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ubvper11->exists($id)) {
			throw new NotFoundException(__('Personal invalido'));
		}
		$options = array('conditions' => array('Ubvper11.' . $this->Ubvper11->primaryKey => $id));
		$this->set('ubvper11', $this->Ubvper11->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel('Ubvsub06');
		if ($this->request->is('post')) {
			$this->Ubvper11->create();
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','ü','Ü','Ú','ñ','Ñ','-','.'));
			if ($this->Ubvper11->save($this->request->data)) {
				$this->Session->setFlash(__('El personal ha sido almacenado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un problema, por favor verifica.'));
			}
		}
		$ubvcar05s = array('0'=>'SELECCIONE')+$this->Ubvper11->Ubvcar05->find('list',array('fields'=>'nombre'));
		$ubvsub06s=array('0'=>'SELECCIONE')+$this->Ubvsub06->find('list',array('conditions'=>array('estatus'=>1)));
		$ubvdus10s = $this->Ubvper11->Ubvdus10->find('list',array('fields'=>'nombre'));
		$this->set(compact('ubvcar05s', 'ubvdus10s','ubvsub06s'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->loadModel('Ubvsub06');
		if (!$this->Ubvper11->exists($id)) {
			throw new NotFoundException(__('Personal invalido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','ü','Ü','Ú','ñ','Ñ','-','.'));
			if(!array_key_exists('ubvdus10_id',$this->data['Ubvper11']))
				$this->request->data=array_merge(array('ubvdus10_id'=>$this->request->data['ubvdus10_id2']),$this->request->data['Ubvper11']);
			if ($this->Ubvper11->save($this->request->data)) {
				$this->Session->setFlash(__('El personal ha sido modificado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un problema, por favor verifica.'));
			}
		} else {
			$options = array('conditions' => array('Ubvper11.' . $this->Ubvper11->primaryKey => $id));
			$this->request->data = $this->Ubvper11->find('first', $options);
		}
		$ubvcar05s = $this->Ubvper11->find('list',array('fields'=>array('Ubvcar05.id','Ubvcar05.nombre'),'conditions'=>array('Ubvper11.id'=>$id),'recursive'=>1));
		$ubvdus10s = $this->Ubvper11->Ubvdus10->find('list',array('fields'=>'nombre'));
		$ubvsub06s=array('0'=>'SELECCIONE')+$this->Ubvsub06->find('list',array('conditions'=>array('estatus'=>1)));
		$this->set(compact('ubvcar05s', 'ubvdus10s','ubvsub06s'));
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
		$this->Ubvper11->id = $id;
		if (!$this->Ubvper11->exists()) {
			throw new NotFoundException(__('Personal invalido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ubvper11->delete()) {
			$this->Session->setFlash(__('Personal eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ha detectado un problema al eliminar'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	
	public function validar_nombre()
	{

			$control='';
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','ü','Ü','Ú','ñ','Ñ','-','.'));
			$this->Ubvper11->set($this->request->data);
			//$control=$this->Ubvbie12->invalidFields();
			$control=$this->Ubvper11->validates(array('fieldList' => array('cedula', 'isUnique')));
			$this->set('control',$control);
			$this->layout='ajax';
	}
}
