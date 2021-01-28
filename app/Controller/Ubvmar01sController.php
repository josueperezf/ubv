<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Ubvmar01s Controller
 *
 * @property Ubvmar01 $Ubvmar01
 */
class Ubvmar01sController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ubvmar01->recursive = 0;
		$this->set('ubvmar01s', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->loadModel('Ubvden08');
		$this->loadModel('Ubvdus10');
		if (!$this->Ubvmar01->exists($id)) {
			throw new NotFoundException(__('Invalid ubvmar01'));
		}
		$options = array('conditions' => array('Ubvmar01.' . $this->Ubvmar01->primaryKey => $id));
		$denominaciones=$this->Ubvden08->find('list',array('fields'=>'nombre','recursive'=>-1));
		$this->set('ubvmar01', $this->Ubvmar01->find('first',$options));
		$this->set('denominaciones',$this->Ubvden08->find('list',array('fields'=>'nombre','recursive'=>-1)));
		$this->set('ubvdus10s',$this->Ubvdus10->find('list',array('fields'=>'nombre','recursive'=>-1)));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ubvmar01->create();
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ','-','.'));
			if ($this->Ubvmar01->save($this->request->data)) {
				//$this->Session->setFlash(__('La marca ha sido almacenada'));
				$this->redirect(array('action' => 'actualizarMarca'));
			} else {
				//comento la siguiente linea de codigo xq la validacion la realizo desde el .js  por lo tanto lo siguiente no hace falta
				//$this->Session->setFlash(__('Ha ocurrido un error, por favor verifica'));
				
			}
		}
		$this->set('marcas',$this->Ubvmar01->find('all',array('fields'=>'nombre','recursive'=>0)));
		$this->layout = 'ajax';
	}
	
	public function addPrincipal() {
		if ($this->request->is('post')) {
			$this->Ubvmar01->create();
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ','-','.'));
			if ($this->Ubvmar01->save($this->request->data)) {
				$this->Session->setFlash(__('La marca ha sido almacenada'));
				$this->redirect(array('action'=> 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un error, por favor verifica'));
				
			}
		}
		$this->set('marcas',$this->Ubvmar01->find('all',array('fields'=>'nombre','recursive'=>0)));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ubvmar01->exists($id)) {
			throw new NotFoundException(__('Invalid ubvmar01'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ','-','.'));
			if ($this->Ubvmar01->save($this->request->data)) {
				$this->Session->setFlash(__('La marca ha sido modificada'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un problema, por favor verifica'));
			}
		} else {
			$options = array('conditions' => array('Ubvmar01.' . $this->Ubvmar01->primaryKey => $id));
			$this->request->data = $this->Ubvmar01->find('first', $options);
		}
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
		$this->Ubvmar01->id = $id;
		if (!$this->Ubvmar01->exists()) {
			throw new NotFoundException(__('Invalid ubvmar01'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ubvmar01->delete()) {
			$this->Session->setFlash(__('Ubvmar01 deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ubvmar01 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function validar_nombre()
	{
			$control='';
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ'));
			$this->Ubvmar01->set($this->request->data);
			$control=$this->Ubvmar01->validates(array('fieldList' => array('nombre', 'isUnique')));
			$this->set('control',$control);
			$this->layout='ajax';
	}
	
	public function actualizarMarca()
	{
		$ubvmar01_id=$this->Ubvmar01->find('list');
		$this->set('ubvmar01_id',$ubvmar01_id);
		$this->layout='ajax';
	}
	public function beforeFilter() {
    	parent::beforeFilter();
		$this->Auth->allow('actualizarMarca');
	}
}
