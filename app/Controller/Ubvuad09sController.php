<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Ubvuad09s Controller
 *
 * @property Ubvuad09 $Ubvuad09
 */
class Ubvuad09sController extends AppController {
public $helpers=array('js','html','form');/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ubvuad09->recursive = 0;
		$this->set('ubvuad09s', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ubvuad09->exists($id)) {
			throw new NotFoundException(__('Invalid ubvuad09'));
		}
		$options = array('conditions' => array('Ubvuad09.' . $this->Ubvuad09->primaryKey => $id));
		$this->set('ubvuad09', $this->Ubvuad09->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ubvuad09->create();
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ','-'));
			if ($this->Ubvuad09->save($this->request->data)) {
				$this->Session->setFlash(__('La unidad administrativa ha sido almacenada'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un problema, por favor verifica'));
			}
		}
		$ubvtua15s = $this->Ubvuad09->Ubvtua15->find('list');
		$ubvsub06s = array('0'=>'SELECCIONE')+$this->Ubvuad09->Ubvsub06->find('list');
		$cantidadAlmacen=$this->Ubvuad09->find('count',array('conditions'=>array('Ubvuad09.ubvtua15_id'=>1,'Ubvuad09.estatus'=>1)));
		$cantidadDesincorp=$this->Ubvuad09->find('count',array('conditions'=>array('Ubvuad09.ubvtua15_id'=>3,'Ubvuad09.estatus'=>1)));;
		if($cantidadAlmacen>0)
			unset($ubvtua15s[1]);
		if($cantidadDesincorp>0)
			unset($ubvtua15s[3]);
		
		$this->set(compact('ubvtua15s', 'ubvsub06s'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ubvuad09->exists($id)) {
			throw new NotFoundException(__('Invalid ubvuad09'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ','-'));
			if ($this->Ubvuad09->save($this->request->data)) {
				$this->Session->setFlash(__('La unidad administrativa ha sido almacenada'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un problema, por favor verifica'));
			}
		} else {
			$options = array('conditions' => array('Ubvuad09.' . $this->Ubvuad09->primaryKey => $id));
			$this->request->data = $this->Ubvuad09->find('first',$options);
		}
		$cantidadBienesuad=$this->Ubvuad09->query('SELECT count(b.id) FROM ubvuad09s as u, ubvdus10s as d, ubvbie12s as b WHERE u.id='.$id.' and d.ubvuad09_id=u.id and  b.ubvdus10_id = d.id;');
		$ubvtua15s = $this->Ubvuad09->Ubvtua15->find('list');
		$ubvsub06s = $this->Ubvuad09->Ubvsub06->find('list');
		$cantidadAlmacen=$this->Ubvuad09->find('count',array('conditions'=>array('Ubvuad09.ubvtua15_id'=>1,'Ubvuad09.estatus'=>1,'Ubvuad09.id !='=>$id)));
		$cantidadDesincorp=$this->Ubvuad09->find('count',array('conditions'=>array('Ubvuad09.ubvtua15_id'=>3,'Ubvuad09.estatus'=>1,'Ubvuad09.id !='=>$id)));;
		if($cantidadAlmacen>0)
			unset($ubvtua15s[1]);
		if($cantidadDesincorp>0)
			unset($ubvtua15s[3]);
		$this->set(compact('ubvtua15s', 'ubvsub06s','cantidadBienesuad'));
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
		$this->Ubvuad09->id = $id;
		if (!$this->Ubvuad09->exists()) {
			throw new NotFoundException(__('Invalid ubvuad09'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ubvuad09->delete()) {
			$this->Session->setFlash(__('Ubvuad09 deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ubvuad09 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function validar_nombre()
	{
		/*debug($this->data);
		$control='';
		$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ'));
		$this->Ubvuad09->set($this->request->data);
		//$control=$this->Ubvbie12->invalidFields();
		$control=$this->Ubvuad09->validates(array('fieldList' => array('nombre', 'isUnique')));
		$this->set('control',$control);*/
		$ubvsub06_id=$this->data['ubvsub06_id'];
		$nombre=$this->data['nombre'];
		$id=$this->data['id'];
		if($id=='')
		{
			if($this->Ubvuad09->find('list',array('recursive'=>2,'fields'=>'nombre','conditions'=>array('Ubvuad09.nombre'=>$nombre,'Ubvsub06.id'=>$ubvsub06_id))))
			$control=false;else $control=true;
		}else
		{
			if($this->Ubvuad09->find('list',array('recursive'=>2,'fields'=>'nombre','conditions'=>array('Ubvuad09.nombre'=>$nombre,'Ubvsub06.id'=>$ubvsub06_id,'Ubvuad09.id !='=>$id))))
			$control=false;else $control=true;
		}
		$this->set(compact('control'));
		$this->layout='ajax';
	}
	
	
	
	
	
	public function listUad()
	{
		if(!array_key_exists('Ubvmov13',$this->data))
			$id=$this->data['Ubvper11']['ubvsub06s'];
		else
			$id=$this->data['Ubvmov13']['Ubvsub06_id'];
		$ubvuad09_id=array('0'=>'seleccione')+$this->Ubvuad09->find('list',array('fields'=>array('id','nombre'),'conditions' =>array('Ubvuad09.ubvsub06_id' => $id,'Ubvuad09.estatus'=>1),'recursive' => -1));
			$this->set(compact('ubvuad09_id'));
		$this->layout = 'ajax';
	}
	
	
	
	public function listMov()
	{
		$id=$this->data['Ubvmov13']['ubvsub06s'];
		$ubvuad09_id1=array('0'=>'seleccione');
		$ubvuad09_id=$this->Ubvuad09->find('list',array(
											'fields'=>array('id','nombre'),
											'conditions' => 
														array('Ubvuad09.ubvsub06_id' => $id,'Ubvuad09.estatus'=>1),
														'recursive' => -1
													)
										);
		$ubvuad09_id=$ubvuad09_id1+$ubvuad09_id;
		$this->set(compact('ubvuad09_id'));
		$this->layout = 'ajax';
	}
	public function listMovd()
	{
		$id=$this->data['ubvsub06s2'];
		$ubvuad09_id1=array('0'=>'seleccione');
		$ubvuad09_id=$this->Ubvuad09->find('list',array(
																		'fields'=>array('id','nombre'),
																		'conditions' => 
																					array('Ubvuad09.ubvsub06_id' => $id,'Ubvuad09.estatus'=>1),
																					'recursive' => -1
																				)
																	);
		$ubvuad09_id2=$ubvuad09_id1+$ubvuad09_id;
		$this->set(compact('ubvuad09_id2'));
		$this->layout = 'ajax';
	}
}
