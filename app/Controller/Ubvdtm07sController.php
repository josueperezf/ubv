<?php
App::uses('AppController', 'Controller');
class Ubvdtm07sController extends AppController {

		public function listRaz()
		{
			$id=$this->data['Ubvmov13']['ubvtmv02s'];
			$this->set('ubvdtm07_id',$this->Ubvdtm07->find('list',array(
																'fields'=>'nombre',
																'conditions' => 
																			array('Ubvdtm07.ubvtmv02_id' => $id),
																			'recursive' => -1
																		)
															)
						);
			$this->layout = 'ajax';
		}
		
}
