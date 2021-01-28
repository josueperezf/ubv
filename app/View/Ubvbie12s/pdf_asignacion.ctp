<?php
 App::import('Vendor','tcpdf/tcpdf');  
 ob_clean();
 $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 $I=0;
 @$res=$data[0]['per']['pernombre']." CI: ".$data[0]['per']['percedula'];
 @$incorporacion=$data[0]['dtm']['dtmnombre'];
//$incorporacion='holissss';
 foreach($data as $data2)
 {
	 if(($data2['bi']['bieserial']=='') || ($data2['bi']['bieserial']==NULL))
	 {	 $data2['bi']['bieserial']='No aplica';}
	$auxiliar[$I]=array('numeroBien'=>$data2['bi']['biecodigo'],
	                     'codigoCatalogo'=>$data2['cat']['catcodigo'],
'descripcion'=>$data2['den']['dennombre'].', Marca: '.$data2['mar']['marnombre'].', S/N: '.$data2['bi']['bieserial'].',  '.$data2['bi']['biedesc'],
                         'unitario'=>$data2['bi']['biemonto'],
						 'salto'=>'no');
 $I++;
 }
 $unidadAdministrati='unidad administrativa';
 $dependenciaUsuaria='dependencia usuaria';
 
 
 $sede="Tachira";

 @$data=$auxiliar;
 $pdf->SetCreator("JL Software");
 $pdf->SetAuthor('Perez Josue');
 $pdf->SetTitle('PDF Inventario');
 $pdf->SetSubject('PDF UBV');
 $numeroLineas=39;
 $tipoLetra="times";
 $fecha=date("d-m-Y");
 $hojaorientacion='P';
 $hojatamano='A4';
 $titulo='COMPROBANTE DE INCORPORACION';
 $pensamiento1='"La corrupcion corroe nuestra alma cuando no tenemos moral" ';
 $pensamiento2='"Simon Bolivar"';
 $w=array(20,26,123,21);
 $caracteres=array(11,15,95,12,2);
 $inicio=0;
 $lineasImpresas=0;
 $faltan=0;
 $lineasImpresas=0;
 $total=count($data);
 $costototal=0;
 $columnas=count($caracteres);
 $page=$total/$numeroLineas;
 @$keys=array_keys($data[0]);
 $SL=4;
 $data=$pdf->arraysaltolinea($SL,$caracteres,$data);
 $imgerror='img/warning.jpg';
 if($data==FALSE)
 $pdf->jl_error($imgerror,'Que Pena Ocurrio un ERROR alguno de los parametros esta erroneo');
 $total=count($data);
 $total-=$SL;
 $page=ceil($total/$numeroLineas);
 $img1='img/ubv1.jpg';
 $img2='img/ubv2.jpg';
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////                             comienza la creacion del pdf                                           //////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($total==0)
{
	$pdf->AddPage($hojaorientacion,$hojatamano);
	$pdf->headerasignacion($img1,$img2,$titulo,$res,$sede,$w,$tipoLetra,'SIN DATOS');
	$pdf->SetFont($tipoLetra, '', 9, '', true);
	$pdf->imprimelineassindatos($numeroLineas,0,$w);
	$pdf->SetFont($tipoLetra, 'B', 10, '', true);  
	$pdf->footerasignacion($pensamiento1,$pensamiento2,$w);
}else
{
	for($I=0;$I<$page;$I++)
	{
		if($I<($page-1))
		{
			$pdf->AddPage($hojaorientacion,$hojatamano);
			$pdf->headerasignacion($img1,$img2,$titulo,$res,$sede,$w,$tipoLetra,$incorporacion);
			$pdf->SetFont($tipoLetra, '', 9, '', true);
			$retornar=$pdf->imprimelineascondatos($numeroLineas,$lineasImpresas,$data,$w);
			$costototal+=$retornar['costototal'];
			$lineasImpresas=$retornar['lineasImpresas'];
			$faltan=$total-$lineasImpresas;
			$pdf->SetFont($tipoLetra, 'B', 10, '', true);
			$pdf->footerasignacion($pensamiento1,$pensamiento2,$w);
		} 
		if($I==($page-1))
		{
			$pdf->AddPage($hojaorientacion,$hojatamano);
			$pdf->headerasignacion($img1,$img2,$titulo,$res,$sede,$w,$tipoLetra,$incorporacion);
			$pdf->SetFont($tipoLetra, '', 9, '', true);
			$faltan=$total-$lineasImpresas;
			$retornar=$pdf->imprimelineascondatos($faltan,$lineasImpresas,$data,$w);
			$costototal+=$retornar['costototal'];
			$lineasImpresas=$retornar['lineasImpresas'];
			$pdf->imprimelineassindatos($numeroLineas,$faltan,$w);
			$pdf->SetFont($tipoLetra, 'B', 10, '', true);
			$pdf->footerasignacion($pensamiento1,$pensamiento2,$w);
		}
	}  
}
$pdf->Output('inventario'.$fecha.'.pdf', 'I');
exit;
 //===========================================================    =+
 // FIN DEL ARCHIVO
 //===========================================================    =+
/**/
?>