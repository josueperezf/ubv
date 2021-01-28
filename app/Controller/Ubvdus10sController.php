<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Ubvdus10s Controller
 *
 * @property Ubvdus10 $Ubvdus10
 */
class Ubvdus10sController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ubvdus10->recursive = 0;
		$this->set('ubvdus10s', $this->paginate());
		$ubvsub06s=$this->Ubvdus10->Ubvuad09->Ubvsub06->find('list',array('recursive'=>2,'Ubvsub06.estatus'=>1));
			$this->set(compact('ubvsub06s'));
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
		if (!$this->Ubvdus10->exists($id)) {
			//throw new NotFoundException(__('Dependencia usuaria Invalida'));
			$this->redirect(array('action' => 'index'));
		}
		$options = array('conditions' => array('Ubvdus10.id=' . $id));
		$this->set('ubvdus10', $this->Ubvdus10->find('first', $options));
		$this->set('denominaciones',$this->Ubvden08->find('list',array('fields'=>'nombre','recursive'=>-1)));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if($this->request->is('ajax')==false)
		{
			if ($this->request->is('post')) {
				$this->Ubvdus10->create();
				$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ'));
				$this->request->data=array_merge(array('ubvuad09_id'=>$this->data['ubvuad09_id']),$this->data['Ubvdus10']);
				if ($this->Ubvdus10->save($this->request->data)) {
					$this->Session->setFlash(__('La dependencia usuaria ha sido almacenada'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Ha ocurrido un problema, por favor verifica.'));
				}
			}
			$ubvsub06s=array('0'=>'SELECCIONE')+$this->Ubvdus10->Ubvuad09->Ubvsub06->find('list',array('recursive'=>2,'Ubvsub06.estatus'=>1));
			$this->set(compact('ubvsub06s'));
		}else
		{
			$Ubvsub06_id=$this->data['Ubvdus10']['Ubvsub06_id'];
			if($Ubvdus10Desin=$this->Ubvdus10->Ubvuad09->Ubvdus10->find('all',array('conditions'=>array('Ubvdus10.estatus'=>1,'Ubvuad09.ubvtua15_id'=>3))))
			{
				$ubvuad09s = $this->Ubvdus10->Ubvuad09->find('list',array('fields'=>'nombre','conditions'=>array('Ubvuad09.ubvtua15_id !='=>'3','Ubvuad09.estatus'=>1,'Ubvuad09.ubvsub06_id'=>$Ubvsub06_id)));
			}else
			{
				$ubvuad09s =$this->Ubvdus10->Ubvuad09->find('list',array('fields'=>'nombre','conditions'=>array('estatus'=>1,'Ubvuad09.ubvsub06_id'=>$Ubvsub06_id)));
			}
			$ubvuad09s=array('0'=>'SELECCIONE')+$ubvuad09s;
			$this->set(compact('ubvuad09s'));
			$this->layout='ajax';
		}
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if($this->request->is('ajax')==false)
		{
			if (!$this->Ubvdus10->exists($id)) {
				throw new NotFoundException(__('Invalid ubvdus10'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {
				$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','Ú','ñ','Ñ'));
				if(!array_key_exists('ubvuad09_id',$this->data['Ubvdus10']))
					$this->request->data=array_merge(array('ubvuad09_id'=>$this->data['ubvuad09_id']),$this->data['Ubvdus10']);
				
				if ($this->Ubvdus10->save($this->request->data)) {
					$this->Session->setFlash(__('La dependencia usuaria ha sido modificada'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Ha ocurrido un problema, por favor verifica.'));
				}
			} else {
				$options = array('conditions' => array('Ubvdus10.' . $this->Ubvdus10->primaryKey => $id));
				$this->request->data = $this->Ubvdus10->find('first', $options);
			}
			//$ubvuad09s = $this->Ubvdus10->Ubvuad09->find('list',array('fields'=>'nombre'));
			$ubvuad09s = $this->Ubvdus10->Ubvuad09->find('list',array('fields'=>array('id','nombre'),'conditions'=>array('estatus'=>1)));
			$cantidadbienes=$this->Ubvdus10->Ubvbie12->find('count',array('conditions'=>array('ubvdus10_id'=>$id)));			
			
			$ubvsub06s=$this->Ubvdus10->Ubvuad09->Ubvsub06->find('list',array('recursive'=>2,'Ubvsub06.estatus'=>1));
			$this->set(compact('ubvuad09s','cantidadbienes','ubvsub06s'));
		}else
		{
			//debug($this->data);
			$Ubvsub06_id=$this->data['Ubvdus10']['Ubvsub06_id'];
			if($Ubvdus10Desin=$this->Ubvdus10->Ubvuad09->Ubvdus10->find('all',array('conditions'=>array('Ubvdus10.estatus'=>1,'Ubvuad09.ubvtua15_id'=>3))))
			{
				$ubvuad09s = $this->Ubvdus10->Ubvuad09->find('list',array('fields'=>'nombre','conditions'=>array('Ubvuad09.ubvtua15_id !='=>'3','Ubvuad09.estatus'=>1,'Ubvuad09.ubvsub06_id'=>$Ubvsub06_id)));
			}else
			{
				$ubvuad09s =$this->Ubvdus10->Ubvuad09->find('list',array('fields'=>'nombre','conditions'=>array('estatus'=>1,'Ubvuad09.ubvsub06_id'=>$Ubvsub06_id)));
			}
			$ubvuad09s=array('0'=>'SELECCIONE')+$ubvuad09s;
			$this->set(compact('ubvuad09s'));
			$this->layout='ajax';
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
		$this->Ubvdus10->id = $id;
		if (!$this->Ubvdus10->exists()) {
			throw new NotFoundException(__('Invalid ubvdus10'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ubvdus10->delete()) {
			$this->Session->setFlash(__('Ubvdus10 deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ubvdus10 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function validar_nombre()
	{
		$ubvsub06_id=$this->data['Ubvsub06_id'];
		$ubvuad09_id=$this->data['ubvuad09_id'];
		$nombre=$this->data['nombre'];
		$id=$this->data['id'];
		$control=false;
		if($id=='')
		{	
			if($this->Ubvdus10->find('list',array('recursive'=>2,'fields'=>'nombre','conditions'=>array('Ubvdus10.nombre'=>$nombre,'Ubvuad09.ubvsub06_id'=>$ubvsub06_id))))
			$control=false;else $control=true;
		}else
		{
			if($this->Ubvdus10->find('list',array('recursive'=>2,'fields'=>'nombre','conditions'=>array('Ubvdus10.nombre'=>$nombre,'Ubvuad09.ubvsub06_id'=>$ubvsub06_id,'Ubvdus10.id !='=>$id))))
			$control=false;else $control=true;
		}
			
			$this->set('control',$control);
			$this->layout='ajax';
	}
	public function listDusper()
	{
		$id=$this->data['ubvuad09_id'];
		$this->set('ubvdus10_id',$this->Ubvdus10->find('list',array('fields'=>'nombre','conditions' => array('Ubvdus10.ubvuad09_id' => $id),'recursive' => -1)));
		$this->layout = 'ajax';
	}
	public function listDusmovorigen()
	{
		$id=$this->data['ubvuad09_id'];
		$this->set('ubvdus10_id',$this->Ubvdus10->find('list',array('fields'=>'nombre','conditions' => array('Ubvdus10.ubvuad09_id' => $id),'recursive' => -1)));
		
		$this->layout = 'ajax';
	}
	public function listDusmovdestino()
	{
		$id=$this->data['ubvuad09_id2'];
		$this->set('ubvdus10_id2',$this->Ubvdus10->find('list',array(
																		'fields'=>'nombre',
																		'conditions' => 
																					array('Ubvdus10.ubvuad09_id' => $id),
																					'recursive' => -1
																				)
																	)
								);
		
		$this->layout = 'ajax';
	}
	public function inventario()
	{
		if($this->request->is('ajax')==false)
		{
			$ubvsub06s=$this->Ubvdus10->Ubvuad09->Ubvsub06->find('all',array('fields'=>'Ubvsub06.nombre','recursive'=>2));
			$ubvsub06s=array('0'=>'SELECCIONE')+Set::combine($ubvsub06s, "{n}.Ubvsub06.id","{n}.Ubvsub06.nombre");
			$ubvdus10s=$this->Ubvdus10->Ubvbie12->query('SELECT DISTINCT dus.id,dus.nombre FROM ubvdus10s AS dus, ubvbie12s AS bie WHERE dus.id = bie.ubvdus10_id');
			$depend=array('0'=>'SELECCIONE')+Set::combine($ubvdus10s, "{n}.dus.id","{n}.dus.nombre");
			$this->set(compact('ubvsub06s'));
		}else
		{
			
				$ubvsub06_id=$this->data['Ubvdus10']['ubvsub06_id'];
				$ubvuad09s=array('0'=>'SELECCIONE')+$this->Ubvdus10->Ubvuad09->find('list',array('fields'=>'Ubvuad09.nombre','conditions'=>array('Ubvuad09.ubvsub06_id'=>$ubvsub06_id)));
				$this->set(compact('ubvuad09s'));
			
			$this->layout = 'ajax';
		}
	}
	public function pdfInventario()
	{
		$id=$this->data['ubvdus10_id2'];
		$data=$this->Ubvdus10->query("
		SELECT
		 uad.nombre AS uadnomb, 
		 dus.nombre AS dusnomb,
		 bie.codigo AS biecodigo, 
		 cat.codigo AS catcodigo, 
		 den.nombre AS dennombre,
		 mar.nombre AS marnombre, 
		 bie.descripcion AS biedesc, 
		 bie.monto AS biemonto, 
		 bie.serial AS bieserial,
		 per.nombre AS pernombre, 
		 per.cedula AS cedula
		FROM ubvdus10s AS dus, 
		 ubvbie12s AS bie, 
		 ubvuad09s AS uad, 
		 ubvmar01s AS mar, 
		 ubvden08s AS den, 
		 ubvcat04s AS cat, 
		 ubvper11s AS per
		WHERE 
		 dus.id =".$id."
		 AND bie.ubvdus10_id = dus.id
		 AND dus.ubvuad09_id = uad.id
		 AND bie.ubvmar01_id = mar.id
		 AND bie.ubvden08_id = den.id
		 AND den.ubvcat04_id = cat.id
		 AND per.ubvdus10_id = dus.id
		 AND per.ubvcar05_id =1");
//el per.ubvcar05_id =1" es para indicar que traiga el jefe d la dependencia usuaria

		$this->set('data',$data);
	}
	
	public function beforeFilter() {
    	parent::beforeFilter();
		$this->Auth->allow('listDusper','listDusmovorigen','listDusmovdestino');
	}
/*	
	public function beforeFilter() {
    	parent::beforeFilter();
		$this->Auth->allow('listDusper','listDusmovorigen','listDusmovdestino');
	}
*/	
}