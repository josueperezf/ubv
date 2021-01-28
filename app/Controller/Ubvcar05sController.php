<?php
App::uses('AppController', 'Controller');
class Ubvcar05sController extends AppController {

		public function listCargo()
		{
			$id=$this->data['ubvdus10_id2'];
			$cantJefeEje=$this->Ubvcar05->query('select count(pe.id) as cantJefEje from ubvper11s as pe, ubvcar05s as ca where ca.id=pe.ubvcar05_id and ca.id=2 and pe.estatus=1');
			$cantJefeEje=$cantJefeEje[0][0]['cantJefEje'];
			$cantJefeDus=$this->Ubvcar05->query('select count(pe.id) as cantJefDus from ubvper11s as pe, ubvcar05s as ca, ubvdus10s as du  where ca.id=pe.ubvcar05_id and ca.id=1 and pe.estatus=1 and du.id= pe.ubvdus10_id and du.id='.$id);
			$cantJefeDus=$cantJefeDus[0][0]['cantJefDus'];
			$cantSecre=$this->Ubvcar05->query('select count(pe.id) as cantSecre from ubvper11s as pe, ubvcar05s as ca, ubvdus10s as du  where ca.id=pe.ubvcar05_id and pe.estatus=1 and ca.id=3 and du.id= pe.ubvdus10_id and du.id='.$id);
			$cantSecre=$cantSecre[0][0]['cantSecre'];
			
			$ubvcar05_id2=$this->Ubvcar05->find('list',array('fields'=>'nombre'));
			if($cantJefeEje>0)
				$ubvcar05_id2=array_diff_assoc($ubvcar05_id2,array('2'=>'Jefe de eje Cipriano Castro'));
			if($cantJefeDus>0)
				$ubvcar05_id2=array_diff_assoc($ubvcar05_id2,array('1'=>'Jefe de deped usuaria'));
			//if($cantJefeEje>0)
			if($cantSecre>0)
				$ubvcar05_id2=array_diff_assoc($ubvcar05_id2,array('3'=>'Asistente'));
				
			//cuando se esta editando
			if($this->data['carOculto']!='')
			{//esta linea espara cuando el llamado lo hace el metodo edit, no el add
				$xxx=explode('-',$this->data['carOculto']);
				if(($xxx[0]==1) && ($cantJefeDus==1)&&($xxx[2]==$id))
				{
					$xxx=array($xxx[0]=>$xxx[1]);
					$ubvcar05_id2=$ubvcar05_id2+$xxx;
				}
				else if(($xxx[0]==2) && ($cantJefeEje==1)&&($xxx[2]==$id))
				{
					$xxx=array($xxx[0]=>$xxx[1]);
					$ubvcar05_id2=$ubvcar05_id2+$xxx;
				}
				else if(($xxx[0]==3) && ($cantSecre==1)&&($xxx[2]==$id))
				{
					$xxx=array($xxx[0]=>$xxx[1]);
					$ubvcar05_id2=$ubvcar05_id2+$xxx;
				}
				
			}
			
			
			$this->set('ubvcar05_id2',$ubvcar05_id2);
			$this->layout = 'ajax';
		}
		
}
