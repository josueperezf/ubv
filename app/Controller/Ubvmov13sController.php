<?php
App::uses('AppController', 'Controller');
/**
 * Ubvmov13s Controller
 *
 * @property Ubvmov13 $Ubvmov13
 */
class Ubvmov13sController extends AppController {
	public $helper=array('Mensaje');
	var $paginate = array(
            'limit' => 25,
			'order' => array(
            'Ubvmov13.id' => 'desc')
        );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ubvmov13->recursive = 0;
		$this->set('ubvmov13s', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->loadModel('Ubvbie12');
		if (!$this->Ubvmov13->exists($id)) {
			throw new NotFoundException(__('Invalid ubvmov13'));
		}
		$options = array('conditions' => array('Ubvmov13.' . $this->Ubvmov13->primaryKey => $id));
		$ubvmov13 = $this->Ubvmov13->find('first', $options);
		$conditions=array();//busqueda por varios indices
		foreach($ubvmov13['Ubvdmo14'] as $bienesExtraidos)
		{
			array_push($conditions,$bienesExtraidos['ubvbie12_id']);

		}
		//aqui busco todos los elemntos donde el id de bienes sea igual a cualquiera de los id que le paso en un array
		$bienes=$this->Ubvbie12->find('all',array('conditions'=>array('ubvbie12.id'=>$conditions)));
		$this->set('ubvmov13', $ubvmov13);
		$this->set('bienes', $bienes);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		date_default_timezone_set("America/Caracas");
		$this->loadModel('Ubvtmv02');
		$this->loadModel('Ubvsub06');
		if ($this->request->is('post')) {
			$this->request->data['Ubvmov13']['fecha']=date('Y-m-d');
			$this->loadModel('ubvdus10s_ubvmov13s');
			$this->loadModel('ubvdmo14s');
			$this->Ubvmov13->create();
			$this->request->data['Ubvmov13']=array_merge(array('tipo'=>'1'),$this->data['Ubvmov13']);
			$ubvdtm07_id=$this->request->data['Ubvmov13']['ubvdtm07_id'];
			$fecha=$this->request->data['Ubvmov13']['fecha'];
			$sql="INSERT INTO ubvmov13s (id,ubvdtm07_id ,fecha) VALUES('',".$ubvdtm07_id.",'".$fecha."')";
			if ($this->Ubvmov13->query($sql)!='')
			{ 
				$id=$this->Ubvmov13->query('SELECT id as idbit FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
				$id=$id[0]['ubvbit16s']['idbit'];
				$user = $this->Session->read('Auth.User');
				$username=$user['username'];
				$user_id=$user['id'];
				$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $id";
				$this->Ubvmov13->query($sql);
				
						
				$origen=$this->data['Ubvdus10']['Ubvdus10'];
				$destino=$this->data['ubvdus10_id'];
				$ubvmov13_id=$this->Ubvmov13->query('SELECT id FROM ubvmov13s ORDER BY id DESC LIMIT 1');	
				$ubvmov13_id=$ubvmov13_id[0]['ubvmov13s']['id'];
				$sql="INSERT INTO ubvdus10s_ubvmov13s (ubvdus10_id,ubvmov13_id ,tipo)     VALUES(".$origen.",".$ubvmov13_id.",1)";
				$this->ubvdus10s_ubvmov13s->query($sql);    ///////////////////////////////////////////////
				$idbitacora=$this->Ubvmov13->query('SELECT id as idbitacora FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
				$idbitacora=$idbitacora[0]['ubvbit16s']['idbitacora'];
				$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $idbitacora";
				$this->Ubvmov13->query($sql);
				
				$sql="INSERT INTO ubvdus10s_ubvmov13s (ubvdus10_id,ubvmov13_id ,tipo)     VALUES(".$destino.",".$ubvmov13_id.",2)";
				$this->ubvdus10s_ubvmov13s->query($sql);
				$idbitacora2=$this->Ubvmov13->query('SELECT id as idbitacora2 FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
				$idbitacora2=$idbitacora2[0]['ubvbit16s']['idbitacora2'];
				$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $idbitacora2";
				$this->Ubvmov13->query($sql);
		//		debug($this->request->data);
				$numeroFila=$this->request->data['indiceFila'];
		//		echo $numeroFila;
				$miarray=$this->request->data['idarray'];
				if($this->data['Ubvmov13']['ubvtmv02s']==2)
					$estatus=1;
				else if($this->data['Ubvmov13']['ubvtmv02s']==3)
					$estatus=0;
				//$miarray es un array que contiene los bienes a mover
				$bienRep='';
				$contador=1;
				foreach($miarray as $idarray)
				{
					if($idarray!='')
					{
						$sql="INSERT INTO ubvdmo14s (id,ubvmov13_id,ubvbie12_id)  VALUES('',".$ubvmov13_id.",".$idarray.")";
						$this->ubvdmo14s->query($sql);
						$idbitaco=$this->Ubvmov13->query('SELECT id as idbitaco'.$idarray.' FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
						$idbitaco=$idbitaco[0]['ubvbit16s']['idbitaco'.$idarray];
						$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $idbitaco";
						$this->Ubvmov13->query($sql);
						$sql="UPDATE ubvbie12s SET ubvdus10_id = $destino, estatus = $estatus WHERE id = $idarray";
						$this->ubvdmo14s->query($sql);
						$idbi=$this->Ubvmov13->query('SELECT id as idbi'.$contador.' FROM ubvbit16s ORDER BY id DESC LIMIT 1');	
						$idbi=$idbi[0]['ubvbit16s']['idbi'.$contador];
						$sql="UPDATE ubvbit16s SET user_id ='".$user_id."' ,usuario = '".$username."' WHERE id = $idbi";
						$this->Ubvmov13->query($sql);
						$bienRep=$idarray;
					}
					$contador++;
				}
				$this->Session->setFlash(__('El movimiento ha sido almacenado'));
				debug($bienRep);
				$this->redirect(array('action' => 'operacionExitosa','bienRep'=>$bienRep));
			} else {
				$this->Session->setFlash(__('Ha ocurrido un problema, por favor verifica.'));
			}
		}
		$ubvdtm07s = array('0'=>'SELECCIONE')+$this->Ubvmov13->Ubvdtm07->find('list',array('fields'=>'nombre','conditions'=>array('ubvtmv02_id'=>'2')));
		$ubvdus10s = array('0'=>'SELECCIONE')+$this->Ubvmov13->Ubvdus10->find('list',array('fields'=>'nombre','conditions'=>array('estatus'=>'1')));
		$ubvtmv02s=array(0=>'SELECCIONE')+$this->Ubvtmv02->find('list',array('conditions'=>array('id !='=>1)));
		//subcoordinacion
		$ubvsub06s=array('0'=>'SELECCIONE')+$this->Ubvsub06->find('list',array('conditions'=>array('estatus'=>1)));
		//subcoordinacion que tiene desincoraciones
		$sub06Desincorporacion=$this->Ubvsub06->Ubvuad09->find('all',array('conditions'=>array('Ubvsub06.estatus'=>1,'Ubvuad09.ubvtua15_id'=>'3','Ubvuad09.estatus'=>'1')));
		//U. administrativa que tiene desincoraciones
		@$Ubvuad09Desin=$sub06Desincorporacion[0]['Ubvuad09']['id'].'-'.$sub06Desincorporacion[0]['Ubvuad09']['nombre'];
		//D. usuaria que tiene desincoraciones
		@$Ubvdus10Desin=$sub06Desincorporacion[0]['Ubvdus10'][0]['id'].'-'.$sub06Desincorporacion[0]['Ubvdus10'][0]['nombre'];
		//[APP\Controller\Ubvmov13sController.php, line 109]Notice (8): Undefined offset: 0 [APP\Controller\Ubvmov13sController.php, line 109]
		@$sub06Desincorporacion=$sub06Desincorporacion[0]['Ubvsub06']['id'];
		//el guion es porq si concateno y no trae nada, solo anexa el simbolo '-'
		if($Ubvdus10Desin=='-')
			unset($ubvtmv02s[3]);
		// con unset($ubvtmv02s[3]); elimino de la lista lo q diga descincorporacion que esta en la posc 3
		$this->set(compact('ubvdtm07s', 'ubvdus10s','ubvtmv02s','ubvsub06s','sub06Desincorporacion','Ubvuad09Desin','Ubvdus10Desin'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ubvmov13->exists($id)) {
			throw new NotFoundException(__('Invalid ubvmov13'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ubvmov13->save($this->request->data)) {
				$this->Session->setFlash(__('The ubvmov13 has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ubvmov13 could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ubvmov13.' . $this->Ubvmov13->primaryKey => $id));
			$this->request->data = $this->Ubvmov13->find('first', $options);
		}
		$ubvdtm07s = $this->Ubvmov13->Ubvdtm07->find('list');
		$ubvdus10s = $this->Ubvmov13->Ubvdus10->find('list');
		$this->set(compact('ubvdtm07s', 'ubvdus10s'));
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
		$this->Ubvmov13->id = $id;
		if (!$this->Ubvmov13->exists()) {
			throw new NotFoundException(__('Invalid ubvmov13'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ubvmov13->delete()) {
			$this->Session->setFlash(__('Ubvmov13 deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ubvmov13 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	public function depDestino()
	{
		$iddus= $this->data['ubvdus10_id2'];
		$ubvdus10_id='';
		$ubvdus10s='';
		$this->loadModel('Ubvdus10');
		$this->loadModel('Ubvbie12');
		if($this->data['ubvdus10_id2']!=0)
		{
			$ubvdus10s=$this->Ubvdus10->find('list',array('fields'=>array('Ubvdus10.id','Ubvdus10.nombre'),'conditions'=>array('id !='=>$this->data['ubvdus10_id2'],'estatus'=>'1')));
		}
		$this->set(compact('ubvdus10s'));
		$this->layout = 'ajax';
	}
	
	//para registro de bienes
	public function operacionExitosa()
	{
		
	}
	//para cargar la data para enviar al reporte de movimiento mensual
	public function movimientoM()
	{
		$this->loadModel('Ubvdus10');
		if($this->request->is('ajax')==false)
		{
		
			$ubvsub06s=array('0'=>'SELECCIONE')+$this->Ubvdus10->Ubvuad09->Ubvsub06->find('list',array('recursive'=>2,'Ubvsub06.estatus'=>1));
			$this->set(compact('ubvsub06s'));
		}else
		{
			$ubvuad09_id=$this->data['ubvuad09_id'];
			$depend=array('0'=>'SELECCIONE')+$this->Ubvdus10->find('list',array('fields'=>'nombre','conditions'=>array('Ubvdus10.ubvuad09_id'=>$ubvuad09_id)));
			$this->set(compact('depend'));
			$this->layout = 'ajax';
		}
	}
	public function listarFechas()
	{
		//debug($this->data);
		
		$id=$this->data['depend'];
		$fecha=$this->Ubvmov13->query("SELECT mov.fecha FROM ubvmov13s AS mov, ubvdus10s_ubvmov13s AS uni WHERE mov.id = uni.ubvmov13_id AND uni.ubvdus10_id = ".$id." ORDER BY  `mov`.`fecha` ASC LIMIT 0 , 1;");
		@$fecha = explode("-", $fecha[0]['mov']['fecha']);
		$fecha=$fecha[0];
		$listaAnos=array('0'=>'SELECCIONE');
		if($fecha!= ''){
			for ($i=$fecha; $i <=date('Y'); $i++) { 
			$listaAnos=$listaAnos+array($i=>$i);
			}
		}
		$meses = array(
						'0'=>'SELECCIONE',
						'01' =>'Enero',
						'02' =>'Febrero',
						'03' =>'Marzo',
						'04' =>'Abril',
						'05' =>'Mayo',
						'06' =>'Junio',
						'07' =>'Julio',
						'08' =>'Agosto',
						'09' =>'Septiembre',
						'10' =>'Octubre',
						'11' =>'Noviembre',
						'12' =>'Diciembre');
		$this->set(compact('listaAnos','meses'));
		$this->layout = 'ajax';
	}
	
	public function pdfMensual()
	{
		$ubvdus10=$this->data['depend'];
		$fecha=$this->data['ano'].'-'.$this->data['mes'].'-%';
		$sql="SELECT
			  mov.id as movid,
			  mov.fecha as movfecha,
			  asdusmov.tipo as asdusmovtipo,
			  dus.nombre as dusnombre,
			  bie.codigo as biecodigo,
			  bie.descripcion as biedes,
			  bie.serial as bieserial,
			  dtm.codigo as dtmcodigo,
			  mar.nombre as marnombre,
			  den.nombre as dennombre,
			  cat.codigo as catcodigo,
			  per.nombre as pernombre,
	  		  per.cedula as percedula,
			  tmv.nombre as tmvnom
			FROM 
				ubvmar01s as mar,
				ubvper11s as per,
				ubvden08s as den,
				ubvcat04s as cat,
				ubvmov13s as mov,
				ubvdus10s_ubvmov13s as asdusmov,
				ubvdus10s as dus,
				ubvdmo14s as dmo,
				ubvbie12s as bie,
				ubvdtm07s as dtm,
				ubvtmv02s as tmv
			WHERE
			  per.ubvcar05_id =1 AND
			  den.ubvcat04_id= cat.id AND 
			  per.ubvdus10_id= dus.id AND
			  bie.ubvden08_id= den.id AND
			  bie.ubvmar01_id= mar.id AND
			  mov.fecha LIKE  '".$fecha."'  AND
			  mov.id =asdusmov.ubvmov13_id AND
			  asdusmov.ubvdus10_id=dus.id AND
			  dmo.ubvmov13_id=mov.id AND
			  dmo.ubvbie12_id = bie.id AND
			  mov.ubvdtm07_id = dtm.id AND
			 dtm.ubvtmv02_id = tmv.id AND
			 dus.id=".$ubvdus10."  
			 ORDER BY mov.id";
		//	 echo"sql $sql <br>";
		$this->set('data',$this->Ubvmov13->query($sql));
		
		
	}
	public function beforeFilter() {
    	parent::beforeFilter();
		$this->Auth->allow('pdfMovimiento');
	}
	public function pdfMovimiento()
	{
		//$id=$this->data['Ubvdus10']['depend'];
		/*
		1 origen
		2 destino
		3 correccion
		*/
//debug($this->request['params']);
//debug($this->params->named);
$id=$this->params->named['idBien'];
//echo"id ".$id."<br>";
		//$id=1;
		$sql="SELECT 
		   	dusmov.ubvdus10_id as dus,
		   	dusmov.tipo as tipdusmov,
		   	dus.nombre as nomdus,
		   	mov.ubvdtm07_id as movdtm,
		   	dtm.nombre,
		   	dmo.ubvbie12_id as idbie,
		   	mov.id as movid,
		   	bie.ubvden08_id as bieden,
		   	bie.descripcion as biedes,
		   	bie.monto as biemon,
			bie.codigo as biecod,
		   	den.ubvcat04_id as dencat,
		   	den.nombre as dennombre,
		   	cat.codigo as catcod,
		   	uad.nombre as uadnom
		FROM 
		    ubvdus10s_ubvmov13s as dusmov,
		    ubvdus10s as dus,
		    ubvmov13s as mov,
		    ubvdtm07s as dtm,
		    ubvdmo14s as dmo,
		    ubvbie12s as bie,
		    ubvden08s as den,
		    ubvcat04s as cat,
		    ubvuad09s as uad
		WHERE 
			uad.id=dus.ubvuad09_id and
			cat.id=den.ubvcat04_id and
			den.id=bie.ubvden08_id and
			bie.id=dmo.ubvbie12_id and
			dmo.ubvmov13_id=mov.id and
			dtm.id=mov.ubvdtm07_id and
			mov.id=dusmov.ubvmov13_id and
			dus.id=dusmov.ubvdus10_id and
			dusmov.ubvmov13_id= (SELECT 
										max(ubvmov13_id) as maximo 
									  FROM `ubvdmo14s` 
									  WHERE 
									  	ubvbie12_id=$id)

		";
//		echo "sql ".$sql."<br>";
	//	$id=2;
		$data=$this->Ubvmov13->query($sql);
		//debug($data); echo"------data en controler------------";
		$I=2;
		foreach ($data as $key) 
		{
			//debug($key);
			if($key['dusmov']['tipdusmov']==1)
				{
					$enviar[$I]['depori']=$key['dus']['nomdus'];
					$enviar[$I]['uadori']=$key['uad']['uadnom'];
				}
			
			if($key['dusmov']['tipdusmov']==2)
				{
					$enviar[$I]['depdes']=$key['dus']['nomdus'];
					$enviar[$I]['uaddes']=$key['uad']['uadnom'];
				}

			$enviar[$I]['dtm']=$key['dtm']['nombre'];
			$enviar[$I]['idbie']=$key['dmo']['idbie'];
			$enviar[$I]['catcod']=$key['cat']['catcod'];
			$enviar[$I]['descripcion']=$key['den']['dennombre']."  ".$key['bie']['biedes'];
			$enviar[$I]['monto']=$key['bie']['biemon'];
			$enviar[$I]['movid']=$key['mov']['movid'];
			$enviar[$I]['biecod']=$key['bie']['biecod'];


			//if($key['dusmov']['tipdusmov']==3)$enviar[1]['depcor']=$key['dusmov']['dus'];
//			debug($enviar);
		//	echo $key['dusmov']['dus'];
		//	echo $key['dusmov']['tipdusmov'];
			$I++;
		}
//el per.ubvcar05_id =1" es para indicar que traiga el jefe d la dependencia usuaria
		//debug($enviar);
		$this->set('enviar',$enviar);
	}
}
