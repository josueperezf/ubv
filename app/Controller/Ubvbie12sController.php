<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Ubvbie12s Controller
 *
 * @property Ubvbie12 $Ubvbie12
 */
class Ubvbie12sController extends AppController{
	public $name='Ubvbie12s';
	var $paginate = array(
            'limit' => 25
        );
	//public $ubvden08_id='';
	public $components = array('RequestHandler');
	public $helpers=array('js','html','form');
/**
 * index method
 *
 * @return void
 */
	public function index() 
	{
		if ($this->request->is('post') || $this->request->is('put')){
			$codigo=trim($this->data['codigoBuscar']);
			if($bien=$this->Ubvbie12->find('first', array('conditions'=>array('Ubvbie12.codigo'=>$codigo),'recursive'=>1))){
					$this->Session->setFlash(__('Bien encontrado'));
					$this->redirect(array('action' => 'view', $bien['Ubvbie12']['id']));
				}else
				{
					$this->Session->setFlash(__('Codigo no encontrado'));
				}
		
		}
		$this->Ubvbie12->recursive = 0;
		$this->set('ubvbie12s', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) 
	{
		if (!$this->Ubvbie12->exists($id)) 
		{
			throw new NotFoundException(__('Bien invalido'));
		}
		//$options = array('conditions' => array('Ubvbie12.' . $this->Ubvbie12->primaryKey => $id));
		//$this->set('ubvbie12', $this->Ubvbie12->find('first', array($options,'recursive'=>1)));
		$this->set('ubvbie12', $this->Ubvbie12->find('first', array('conditions'=>array('Ubvbie12.id'=>$id),'recursive'=>1)));
	}
	
	
	public function add() 
	{
		$this->loadModel('Ubvcat04');
		$this->loadModel('Ubvdtm07');
		if ($this->request->is('post')) 
		{
			$this->Ubvbie12->create();
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','ü','Ü','Ú','ñ','Ñ','-','.'));
			@$this->data=array_merge($this->data['Ubvbie12'], array('ubvden08_id'=>$this->data['ubvden08_id']));
		}
		$Ubvcat04s = array('0'=>'SELECCIONE')+$this->Ubvcat04->find('list',array('fields'=>'nombre'));
		$Ubvdtm07s = array('0'=>'SELECCIONE')+$this->Ubvdtm07->find('list',array('fields'=>'nombre','conditions'=>array('ubvtmv02_id'=>'1')));
		
		//$ubvdus10s = $this->Ubvbie12->Ubvdus10->query("SELECT du.id,du.nombre FROM ubvdus10s du, ubvuad09s ua WHERE du.ubvuad09_id = ua.id AND ubvtua15_id='2' AND du.estatus='1' AND ua.estatus='1'");

		$ubvdus10s = $this->Ubvbie12->Ubvdus10->find('list',array('fields'=>'nombre','recursive'=>'2','conditions'=>array('Ubvuad09.ubvtua15_id'=>1,'Ubvuad09.estatus'=>1,'Ubvdus10.estatus'=>1)));
		//$ubvdus10s=array_merge(array('0'=>'SELECCIONE'),$ubvdus10s);
		$ubvdus10s=array('0'=>'SELECCIONE')+$ubvdus10s;
		
		$ubvmar01s =array('0'=>'SELECCIONE')+$this->Ubvbie12->Ubvmar01->find('list',array('fields'=>'nombre'));
		$this->set(compact('ubvdus10s', 'ubvmar01s','Ubvcat04s','Ubvdtm07s'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) 
	{
		$this->loadModel('Ubvcat04');
		$this->loadModel('Ubvmov13');	
		$this->loadModel('ubvdus10s_ubvmov13s');
		$this->loadModel('ubvdmo14s');
		if (!$this->Ubvbie12->exists($id)) 
			throw new NotFoundException(__('Invalid ubvbie12'));
		if ($this->request->is('post') || $this->request->is('put')) 
		{
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','ü','Ü','Ú','ñ','Ñ','-','.'));
			$options = array('conditions' => array('Ubvbie12.' . $this->Ubvbie12->primaryKey => $id),'recursive'=>-1);
			$auxiliar= $this->Ubvbie12->find('first', $options);
			if(array_key_exists('ubvden08_id',$this->data))
			{
				$this->data=array_merge(array('ubvden08_id'=>$this->data['ubvden08_id']),$this->data['Ubvbie12']);	
				$this->data=array_fill_keys(array('Ubvbie12'), $this->data);
			}
			$this->request->data['Ubvbie12']['fecha']=date('Y-m-d');
			
			
			if(($auxiliar['Ubvbie12']['ubvden08_id']!=$this->data['Ubvbie12']['ubvden08_id'])&&
			($auxiliar['Ubvbie12']['ubvmar01_id']==$this->data['Ubvbie12']['ubvmar01_id'])&&
			($auxiliar['Ubvbie12']['serial']==$this->data['Ubvbie12']['serial'])&&
			($auxiliar['Ubvbie12']['monto']==$this->data['Ubvbie12']['monto'])&&
			($auxiliar['Ubvbie12']['descripcion']==$this->data['Ubvbie12']['descripcion']))
			{
				//Para la denominacion
				//debug($this->data);
				//echo('auxiliar denominacion diferente a data denominacion');
				$this->request->data['Ubvbie12']['ubvdtm07_id']='23';
			}elseif(($auxiliar['Ubvbie12']['ubvden08_id']==$this->data['Ubvbie12']['ubvden08_id'])&&
			($auxiliar['Ubvbie12']['ubvmar01_id']==$this->data['Ubvbie12']['ubvmar01_id'])&&
			($auxiliar['Ubvbie12']['serial']==$this->data['Ubvbie12']['serial'])&&
			($auxiliar['Ubvbie12']['monto']!=$this->data['Ubvbie12']['monto'])&&
			($auxiliar['Ubvbie12']['descripcion']==$this->data['Ubvbie12']['descripcion']))
			{
				//Para el monto
				//debug($this->data);
				//echo('auxiliar monto diferente a data monto');
				$this->request->data['Ubvbie12']['ubvdtm07_id']='33';
			}elseif(($auxiliar['Ubvbie12']['ubvmar01_id']!=$this->data['Ubvbie12']['ubvmar01_id'])||
			($auxiliar['Ubvbie12']['serial']!=$this->data['Ubvbie12']['serial'])||
			($auxiliar['Ubvbie12']['descripcion']!=$this->data['Ubvbie12']['descripcion']))
			{
				//Para algun campo que no es monto ni denominacion y colocar correccion incorporacion
				$this->request->data['Ubvbie12']['ubvdtm07_id']='32';
			}else
				{
					$this->Session->setFlash(__('No ha ocurrido ningun cambio'));
					$this->redirect(array('action' => 'index'));
				}
				
				//$informacion=array_fill_keys(array('Ubvmov13'),$this->data['Ubvbie12']);
				
			if($this->Ubvbie12->save($this->data))
			{	
				$sql="INSERT INTO ubvmov13s (id, ubvdtm07_id, fecha) VALUES('',".$this->data['Ubvbie12']['ubvdtm07_id'].",'".$this->data['Ubvbie12']['fecha']."' )";
				$this->Ubvmov13->query($sql);
				$idbit=$this->Ubvmov13->query('SELECT id as idbit FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
				$idbit=$idbit[0]['ubvbit16s']['idbit'];
				$user = $this->Session->read('Auth.User');
				$username=$user['username'];
				$user_id=$user['id'];
				$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $idbit";
				$this->Ubvbie12->query($sql);
				$ubvmov13_id=$this->Ubvmov13->query('SELECT id FROM ubvmov13s ORDER BY id DESC LIMIT 1');
				$ubvmov13_id=$ubvmov13_id[0]['ubvmov13s']['id'];
				$ubvdus10_id=$this->data['Ubvbie12']['ubvdus10_id'];
				$ubvdus12_id=$this->data['Ubvbie12']['id'];
				$this->Ubvmov13->query("INSERT INTO ubvdus10s_ubvmov13s (ubvmov13_id, ubvdus10_id,tipo)     VALUES(".$ubvmov13_id.",".$ubvdus10_id.",'3' )");
				$idbitacora=$this->Ubvmov13->query('SELECT id as idbitacora FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
				$idbitacora=$idbitacora[0]['ubvbit16s']['idbitacora'];
				$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $idbitacora";
				$this->Ubvbie12->query($sql);
				
				$this->Ubvmov13->query("INSERT INTO ubvdmo14s (id,ubvmov13_id, ubvbie12_id) VALUES('',".$ubvmov13_id.",".$ubvdus12_id." )");			
				$idbita=$this->Ubvmov13->query('SELECT id as idbita FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
				$idbita=$idbita[0]['ubvbit16s']['idbita'];
				$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $idbita";
				$this->Ubvbie12->query($sql);
				$this->Session->setFlash(__('El bien ha sido editado'));
				$this->redirect(array('action' => 'index'));
			} else 
			{
				$this->Session->setFlash(__('Ha ocurrido un error, por favor verifica.'));
			}
		} else 
		{
			$options = array('conditions' => array('Ubvbie12.' . $this->Ubvbie12->primaryKey => $id));
			$this->request->data = $this->Ubvbie12->find('first', $options);
		}
		$Ubvcat04s = array('0'=>'SELECCIONE') +$this->Ubvcat04->find('list',array('fields'=>'nombre'));
		$ubvden08s = $this->Ubvbie12->Ubvden08->find('list',array('fields'=>'nombre'));
		$ubvdus10s = $this->Ubvbie12->Ubvdus10->find('list',array('fields'=>'nombre'));
		$ubvmar01s = $this->Ubvbie12->Ubvmar01->find('list',array('fields'=>'nombre'));
		$this->set(compact('ubvden08s', 'ubvdus10s', 'ubvmar01s','Ubvcat04s'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) 
	{
		$this->Ubvbie12->id = $id;
		if (!$this->Ubvbie12->exists()) 
		{
			throw new NotFoundException(__('Invalid ubvbie12'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ubvbie12->delete()) 
		{
			$this->Session->setFlash(__('El bien ha sido eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ubvbie12 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	public function addAjax()
	{
		$this->data=$this->data+array('estatus'=>1);
		$estado='';
		if($this->RequestHandler->isAjax())
		{
			$this->loadModel('Ubvmov13');	
			$this->loadModel('ubvdus10s_ubvmov13s');
			$this->loadModel('ubvdmo14s');
			$this->request['data']=array('Ubvbie12'=>$this->data);
			$this->Ubvbie12->create();
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','ü','Ü','Ú','ñ','Ñ','-','.'));
			if ($this->request->data['bandera']=='0') 
			{
				if ($this->Ubvbie12->save($this->data) && $this->Ubvmov13->save($this->data)) 
				{
					$ubvdtm07_id=$this->data['ubvdtm07_id'];
					$fecha=$this->data['fecha'];
					if($ubvmov13_id=$this->Ubvmov13->query('SELECT id FROM ubvmov13s ORDER BY id DESC LIMIT 1'))
					{
						$id=$this->Ubvmov13->query('SELECT id as idbit FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
						$id=$id[0]['ubvbit16s']['idbit'];
						$user = $this->Session->read('Auth.User');
						$username=$user['username'];
						$user_id=$user['id'];
						$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $id";
						$this->Ubvmov13->query($sql);
					}
					$ubvmov13_id=$ubvmov13_id[0]['ubvmov13s']['id'];
					$ubvdus10_id=$this->data['ubvdus10_id'];
					$tipo=2;//se decidio que el dos es el destino
					$this->data=array_merge(array('tipo'=>'2','ubvmov13_id'=>$ubvmov13_id),$this->data);
					if($this->ubvdus10s_ubvmov13s->save($this->data))
					{
						$id=$this->ubvdus10s_ubvmov13s->query('SELECT id as idbitacora FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
						$id=$id[0]['ubvbit16s']['idbitacora'];
						$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $id";
						$this->ubvdus10s_ubvmov13s->query($sql);
					}
					$ubvbie12_id=$this->Ubvbie12->query('SELECT id FROM Ubvbie12s ORDER BY id DESC LIMIT 1');
					$ubvbie12_id=$ubvbie12_id[0]['Ubvbie12s']['id'];
					$this->ubvdmo14s->save(array_merge(array('ubvbie12_id'=>$ubvbie12_id),$this->data));
					$idbit14=$this->ubvdus10s_ubvmov13s->query('SELECT id as idbit14 FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
					$idbit14=$idbit14[0]['ubvbit16s']['idbit14'];
					$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $idbit14";
					$this->ubvdus10s_ubvmov13s->query($sql);
					$estado='bien';
				} else 
				{
					$estado='mal';
					$this->Session->setFlash('Ha ocurrido un problema al insertar un bien, por favor verifica.');
				}	
			}elseif($this->request->data['bandera']=='1') 
			{
				
				if ($this->Ubvbie12->save($this->data))
				{
					
					if($ubvmov13_id=$this->Ubvmov13->query('SELECT id FROM ubvmov13s ORDER BY id DESC LIMIT 1'))
					$ubvmov13_id=$ubvmov13_id[0]['ubvmov13s']['id'];
					$ubvbie12_id=$this->Ubvbie12->query('SELECT id FROM Ubvbie12s ORDER BY id DESC LIMIT 1');
					$ubvbie12_id=$ubvbie12_id[0]['Ubvbie12s']['id'];
					if($this->ubvdmo14s->save(array_merge(array('ubvmov13_id'=>$ubvmov13_id,'ubvbie12_id'=>$ubvbie12_id),$this->data)))
					{
						$id=$this->Ubvmov13->query('SELECT id as idbit FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
						$id=$id[0]['ubvbit16s']['idbit'];
						$user = $this->Session->read('Auth.User');
						$username=$user['username'];
						$user_id=$user['id'];
						$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $id";
						$this->Ubvmov13->query($sql);
					}
					$estado='bien';
				}
			}
			$this->set('estado',$estado);
		}
	//	$this->layout = 'ajax';
	
	}

	
	public function consultarBien()
	{
		$estado='';
		$repetido='';
		$bien='';
		$origen=$this->data['ubvdus10_id2'];
		foreach($this->data['codigoarray'] as $informacion)
		{
			if($informacion==$this->data['codigo'])
				{$repetido=1; $bien=3;}
		}
		if($repetido!=1)
		{
			if($bien=$this->Ubvbie12->find('first', array('recursive'=>1,
			'conditions' => array('Ubvbie12.codigo' => $this->data['codigo'],'Ubvbie12.ubvdus10_id'=>$origen)))){//si trae data hace la siguiente linea
			$estado=1;}
			else{
				$bien='';
				}
		}
		$this->set('bien',$bien);
	}
	public function validar_nombre()
	{

			$control='';
			$this->request->data=Sanitize::paranoid($this->data,array(' ','á','Á','é','É','í','Í','ó','Ó','ú','ü','Ü','Ú','ñ','Ñ','-','.'));
			$this->Ubvbie12->set($this->request->data);
			//$control=$this->Ubvbie12->invalidFields();
			$control=$this->Ubvbie12->validates(array('fieldList' => array('codigo', 'isUnique')));
			$this->set('control',$control);
			$this->layout='ajax';
	}
	
	public function pdfAsignacion($id=null)
	{
		$sql="SELECT 
	  bi.codigo as biecodigo, 
	  cat.codigo as catcodigo,
	  den.nombre as dennombre,
	  mar.nombre as marnombre,
	  bi.serial as bieserial,
	  bi.descripcion as biedesc,
	  bi.monto as biemonto,
	  per.nombre as pernombre,
	  per.cedula as percedula,
	  dtm.nombre as dtmnombre
	FROM 
	  ubvmov13s as mov,
	  ubvdtm07s as dtm,
	  ubvper11s as per,
	  ubvdus10s as dus,
	  ubvcat04s as cat,
	  ubvden08s as den, 
	  ubvdmo14s as dm, 
	  ubvbie12s as bi,
	  ubvmar01s as mar 
	WHERE
	  dm.ubvmov13_id = mov.id AND
	  mov.ubvdtm07_id = dtm.id AND
	  per.ubvcar05_id =1 AND 
	  per.ubvdus10_id= dus.id AND
	  bi.ubvdus10_id= dus.id AND
	  den.ubvcat04_id= cat.id AND
	  bi.ubvden08_id= den.id AND
	  bi.ubvmar01_id= mar.id AND
	  bi.id = dm.ubvbie12_id AND 
	  dm.ubvmov13_id = ( 
		SELECT dmo.ubvmov13_id
		FROM 
			ubvbie12s AS bie, 
			ubvdmo14s AS dmo
		WHERE 
			bie.codigo =".$id." AND 
			dmo.ubvbie12_id = bie.id )
	";
		$data=$this->Ubvbie12->query($sql);
		$this->set('data',$data);
	} 


	public function repArticulo()
	{
		if($this->params['isAjax']==false)
		{
			$this->loadModel('Ubvsub06');	
			$Ubvsub06s=array('0'=>'SELECCIONE')+$this->Ubvsub06->find('list',array('conditions'=>array('Ubvsub06.estatus'=>1)));
			$this->set(compact('Ubvsub06s'));
		}else
		{
			$subcoordinacion=$this->data['Ubvbie12']['Ubvsub06'];
			$sql="SELECT DISTINCT (cat.nombre), 
			        cat.id AS id
				  FROM 
				    ubvsub06s AS sub, 
					ubvuad09s AS uad, 
					ubvdus10s AS dus, 
					ubvbie12s AS bie, 
					ubvden08s AS den, 
					ubvcat04s AS cat
				  WHERE sub.id =".$subcoordinacion."
					AND sub.id = uad.ubvsub06_id
					AND uad.id = dus.ubvuad09_id
					AND dus.id = bie.ubvdus10_id
					AND bie.ubvden08_id = den.id
					AND cat.id = den.ubvcat04_id";
			$Ubvcat04s=$this->Ubvbie12->query($sql);
			$Ubvcat04s=array('0'=>'SELECCIONE')+Set::combine($Ubvcat04s, "{n}.cat.id","{n}.cat.nombre");
			$this->set(compact('Ubvcat04s'));
			$this->layout='ajax';
		}
	}
	public function pdfCantidad()
	{
		$idSubcoordinacion=$this->data['Ubvbie12']['Ubvsub06'];
		$idDenominacion=$this->data['ubvden08_id'];
		$sql="SELECT
				dus.id as dusid,
				dus.nombre as dusnom,
				uad.nombre as uadnom,
				sub.nombre as subnom
			  FROM
			  ubvsub06s as sub,
			  ubvuad09s as uad,
			  ubvdus10s as dus
			  WHERE
			  sub.id=uad.ubvsub06_id AND
			  dus.ubvuad09_id=uad.id AND 
			  uad.ubvsub06_id=".$idSubcoordinacion." AND
			  uad.ubvsub06_id= sub.id

		";
		//echo"eql uad $sql <br>";
		$consulta=$this->Ubvbie12->query($sql);
		$I=0;
		foreach ($consulta as $key) 
		{
			foreach ($key as $aqui) 
			{
				//debug($aqui);
				//$enviar[$I]['denominacion']=$idDenominacion;					
				@$enviar[$I]['subnom']=$aqui['subnom'];
				
				if(@$aqui['uadnom']!=NULL)@$enviar[$I]['uadnom']=$aqui['uadnom'];
				if(@$aqui['dusid']!=NULL)
				{
				$enviar[$I]['dusnom']=$aqui['dusnom'];
				//debug($enviar);
				$sql2="SELECT 
						bie.id,
						count(bie.ubvden08_id) as cantidad,
						den.nombre as dennom 
					FROM
						ubvbie12s as bie,
						ubvden08s as den
					WHERE
						den.id=bie.ubvden08_id AND
						bie.ubvdus10_id=".$aqui['dusid']." AND
						bie.ubvden08_id=".$idDenominacion."
						";


				$consulta2=$this->Ubvbie12->query($sql2);
				}
				//debug($consulta2);
				$J=0;
				foreach ($consulta2 as $key2) 
				{
					
					//$enviar[$I][$J]['bie']=$key2['bie']['id'];					
					$enviar[$I]['cantidad']=$key2[0]['cantidad'];					
					$dennombre=$key2['den']['dennom'];
								
				//	debug($key2);
					$J++;
				}
				$enviar[$I]['dennom']=$dennombre;		
			}

			//	debug($enviar);
		$I++;
		}
		$this->set('enviar',$enviar);
	}	
	
	
	public function bienvenido()
	{
		$user = $this->Session->read('Auth.User');
		if($user==null)
			$this->redirect(array('controller'=>'users','action' => 'login'));
	}
	
	public function beforeFilter() {
    	parent::beforeFilter();
		$this->Auth->allow('repArticulo','pdfCantidad','bienvenido');
	}
}
