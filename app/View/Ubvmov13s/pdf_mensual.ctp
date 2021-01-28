<?php
//debug($data);

 App::import('Vendor','tcpdf/tcpdf');  
 ob_clean();
 $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 $I=0;
	 $pdf->SetCreator("JL Software");
	 $pdf->SetAuthor('Perez Josue');
	 $pdf->SetTitle('PDF Inventario');
	 $pdf->SetSubject('PDF UBV');
	 $numeroLineas=39;
	 $tipoLetra="times";
	 $fecha=date("d-m-Y");
	 $hojaorientacion='P';
	 $hojatamano='A4';
	 $titulo='Movimientos Mensuales';
	 $imgerror='img/warning.jpg';
	 $sede="Tachira";
	 $pensamiento1='"La corrupcion corroe nuestra alma cuando no tenemos moral" ';
	 $pensamiento2='"Simon Bolivar"';
	 $w=array(11,15,15,14,98,25,12);
	 $caracteres=array(8,11,10,9,76,15,12);
	 $SL=4;
	 $inicio=$lineasImpresas=$faltan=$costototal=0;
	 $img1='img/ubv1.jpg';
	 $img2='img/ubv2.jpg';

 if(($data!=0)and($data!='')and($data!=NULL))
{
	 //$res=$data[0]['per']['pernombre']." CI: ".$data[0]['per']['percedula'];
	 //$incorporacion=$data[0]['dtm']['dtmnombre'];
	//$incorporacion='holissss';
	 $jefe=$data[0]['per']['pernombre'];
	 $cedula=$data[0]['per']['percedula'];
	 $dUsuaria=$data[0]['dus']['dusnombre'];

	 foreach($data as $data2)
	 {
	 	if(($data2['bie']['bieserial']=='') || ($data2['bie']['bieserial']==NULL))
		 	{	 $data2['bie']['bieserial']='No aplica';	}
		 if($data2['asdusmov']['asdusmovtipo']==3){$data2['tmv']['tmvnom']='correc';}
		$auxiliar[$I]=array('movid'=>$data2['mov']['movid'],
							'fecha'=>$data2['mov']['movfecha'],
							'codigoCatalogo'=>$data2['cat']['catcodigo'],
							'numeroBien'=>$data2['bie']['biecodigo'],
	'descripcion'=>$data2['den']['dennombre'].', Marca: '.$data2['mar']['marnombre'].',  '.$data2['bie']['biedes'],
	                        'serial'=>$data2['bie']['bieserial'],


	                        'concepto'=>$data2['tmv']['tmvnom'],


	                        'salto'=>'no');
	 $I++;
	 }
	$data=$auxiliar;
	 //$unidadAdministrati='unidad administrativa';
	 //$dependenciaUsuaria='dependencia usuaria';
	 
	 
	 $data=$auxiliar;
	 $total=count($data);
	 $columnas=count($caracteres);
	 $page=$total/$numeroLineas;
	 $keys=array_keys($data[0]);
	 $data=$pdf->arraysaltolinea($SL,$caracteres,$data);
	 //print_r($data);
	 if($data==FALSE)echo"alguno de los parametros esta erroneo <br>";
	 $total=count($data);
	 $total-=$SL;
	 $page=ceil($total/$numeroLineas);
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////                             comienza la creacion del pdf                                           //////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($total==0)
	{
		$pdf->AddPage($hojaorientacion,$hojatamano);
	//	$pdf->headerasignacion($img1,$img2,$titulo,$res,$sede,$w,$tipoLetra,'SIN DATOS');
		$pdf->headermensual($img1,$img2,$titulo,$sede,$w,$tipoLetra,$dUsuaria);
		$pdf->SetFont($tipoLetra, '', 9, '', true);
		$pdf->imprimelineassindatos($numeroLineas,0,$w);
		$pdf->SetFont($tipoLetra, 'B', 10, '', true);  
	//	$pdf->footerasignacion($pensamiento1,$pensamiento2,$w);
		$pdf->footermensual($pensamiento1,$pensamiento2,$w,$jefe,$cedula);
	}else
	{
		for($I=0;$I<$page;$I++)
		{
			if($I<($page-1))
			{
				$pdf->AddPage($hojaorientacion,$hojatamano);
		//		$pdf->headerasignacion($img1,$img2,$titulo,$res,$sede,$w,$tipoLetra,$incorporacion);
				$pdf->headermensual($img1,$img2,$titulo,$sede,$w,$tipoLetra,$dUsuaria);
				$pdf->SetFont($tipoLetra, '', 9, '', true);
				$retornar=$pdf->imprimelineascondatos($numeroLineas,$lineasImpresas,$data,$w);
				$costototal+=$retornar['costototal'];
				$lineasImpresas=$retornar['lineasImpresas'];
				$faltan=$total-$lineasImpresas;
				$pdf->SetFont($tipoLetra, 'B', 10, '', true);
			//	$pdf->footerasignacion($pensamiento1,$pensamiento2,$w);
				$pdf->footermensual($pensamiento1,$pensamiento2,$w,$jefe,$cedula);
			} 
			if($I==($page-1))
			{
				$pdf->AddPage($hojaorientacion,$hojatamano);
		//		$pdf->headerasignacion($img1,$img2,$titulo,$res,$sede,$w,$tipoLetra,$incorporacion);
				$pdf->headermensual($img1,$img2,$titulo,$sede,$w,$tipoLetra,$dUsuaria);
				$pdf->SetFont($tipoLetra, '', 9, '', true);
				$faltan=$total-$lineasImpresas;
				$retornar=$pdf->imprimelineascondatos($faltan,$lineasImpresas,$data,$w);
				$costototal+=$retornar['costototal'];
				$lineasImpresas=$retornar['lineasImpresas'];
				$pdf->imprimelineassindatos($numeroLineas,$faltan,$w);
				$pdf->SetFont($tipoLetra, 'B', 10, '', true);
		//		$pdf->footerasignacion($pensamiento1,$pensamiento2,$w);
				$pdf->footermensual($pensamiento1,$pensamiento2,$w,$jefe,$cedula);
			}
		}  
	}
}else
{
//	$dUsuaria='';
//	$texto="Existe Un Error En El Parametro Porfavor Verifica";
//	$pdf->jl_error($imgerror,$texto);
	$pdf->AddPage($hojaorientacion,$hojatamano);
	$dUsuaria=$jefe=$cedula='';
	//	$pdf->headerasignacion($img1,$img2,$titulo,$res,$sede,$w,$tipoLetra,'SIN DATOS');
		$pdf->headermensual($img1,$img2,$titulo,$sede,$w,$tipoLetra,$dUsuaria);
		$pdf->SetFont($tipoLetra, '', 9, '', true);
		$pdf->imprimelineassindatos($numeroLineas,0,$w);
		$pdf->SetFont($tipoLetra, 'B', 10, '', true);  
	//	$pdf->footerasignacion($pensamiento1,$pensamiento2,$w);
		$pdf->footermensual($pensamiento1,$pensamiento2,$w,$jefe,$cedula);

}
$pdf->Output('MENSUAL-'.$dUsuaria.'-'.$fecha.'.pdf', 'I');
exit;
 //===========================================================    =+
 // FIN DEL ARCHIVO
 //===========================================================    =+
/**/
?>