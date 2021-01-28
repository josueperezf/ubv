<?php
App::uses('AppController', 'Controller');
class Ubvden08sController extends AppController {
	public function listaDeno()
	{
		if($idCatalogo=$this->request->data['Ubvbie12']['Ubvcat04s'])
		{
			$this->set('ubvden08_id',$this->Ubvden08->find('list',array(
																'fields'=>'nombre',
																'conditions' => 
																			array('Ubvden08.ubvcat04_id' => $idCatalogo),
																			'recursive' => -1
																		)));
		}else
		{
			$subcoordiacion=$this->data['Ubvbie12']['Ubvsub06'];
			$catalogo=$this->data['Ubvcat04'];
			$sql="SELECT den.id as id, den.nombre AS nombre
				  FROM
				  	ubvsub06s AS sub,
					ubvuad09s AS uad,
					ubvdus10s AS dus,
					ubvbie12s AS bie,
					ubvden08s AS den,
					ubvcat04s AS cat
				  WHERE
				  	sub.id =".$subcoordiacion." AND
					sub.id = uad.ubvsub06_id AND
					uad.id = dus.ubvuad09_id AND
					dus.id = bie.ubvdus10_id AND
					bie.ubvden08_id = den.id AND
					cat.id = den.ubvcat04_id AND
					cat.id =".$catalogo."";
			$ubvden08_id=$this->Ubvden08->query($sql);
			$ubvden08_id=array('0'=>'SELECCIONE')+Set::combine($ubvden08_id, "{n}.den.id","{n}.den.nombre");
			$this->set(compact('ubvden08_id'));
		}
		
			$this->layout = 'ajax';
	}
}
