<?php
	//debug($enviar);
 App::import('Vendor','tcpdf/tcpdf');  
 ob_clean();
 $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//var_dump($enviar);
$I=1;
	$origen='';
 	$destino='';
 	$dtm='';
  $n= count($enviar);
  for($I=2;$I<($n/2)+2;$I++)
  	{
		$data[$I-2]=array('numeroBien'=>$enviar[$I]['biecod'],
 						  'codigoCatalogo'=>$enviar[$I]['catcod'],
 						  'descripcion'=>$enviar[$I]['descripcion'],
 						  'monto'=>$enviar[$I]['monto'],
						  'salto'=>'no');
	}
 foreach ($enviar as $key) 
 {
 	//debug($key);
 	if(@$key['depori']!=NULL)$origen="UAD ".$key['uadori']." >> ".$key['depori'];
 	if(@$key['depdes']!=NULL)$destino="UAD ".$key['uaddes']." >> ".$key['depdes'];
 	@$dtm=$key['dtm'];
 	$movid=$key['movid'];
 	$I++;
 }
 

 $I=0;
 $tipoLetra="times";
 $fecha=date("d-m-Y");
 $hojaorientacion='P';
 $hojatamano='A4';
 $pensamiento1='"La corrupcion corroe nuestra alma cuando no tenemos moral" ';
 $pensamiento2='"Simon Bolivar"';
 $w=array(20,26,123,21);
 $caracteres=array(11,15,95,12,2);
 $total=$res=$numeroLineas=$lineasImpresas=$faltan=$lineasImpresas=$costototal=0;
 $img1='img/ubv1.jpg';
 $img2='img/ubv2.jpg';
 $titulo='COMPROBANTE DE MOVIMIENTO';


 
 $sede="Tachira";


 $pdf->SetCreator("JL Software");
 $pdf->SetAuthor('Perez Josue');
 $pdf->SetTitle('PDF Inventario');
 $pdf->SetSubject('PDF UBV');
 $numeroLineas=39;
 $tipoLetra="times";
 $fecha=date("d-m-Y");
 $hojaorientacion='P';
 $hojatamano='A4';
 $titulo='COMPROBANTE DE MOVIMIENTO';
 $pensamiento1='"La corrupcion corroe nuestra alma cuando no tenemos moral" ';
 $pensamiento2='"Simon Bolivar"';
 $w=array(20,26,123,21);
 $caracteres=array(11,15,95,12,2);
 $inicio=0;
 $total=count($data);
 $columnas=count($caracteres);
 $page=$total/$numeroLineas;
 $keys=array_keys($data[0]);
 $SL=4;

 $data=$pdf->arraysaltolinea($SL,$caracteres,$data);
 if($data==FALSE)echo"alguno de los parametros esta erroneo <br>";
 $total=count($data);
 $total-=$SL;
 $page=ceil($total/$numeroLineas);
 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////                           comienza la creacion del pdf                                           ///////
////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

if($total==0)
{
	$pdf->AddPage($hojaorientacion,$hojatamano);
	$pdf->headermovimiento($img1,$img2,$titulo,$res,$sede,$w,$tipoLetra,$dtm,$origen,$destino,$movid);
	

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
			$pdf->headermovimiento($img1,$img2,$titulo,$res,$sede,$w,$tipoLetra,$dtm,$origen,$destino,$movid);
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
			$pdf->headermovimiento($img1,$img2,$titulo,$res,$sede,$w,$tipoLetra,$dtm,$origen,$destino,$movid);
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
$pdf->Output('movimiento'.$fecha.'.pdf', 'I');
exit;
 //===========================================================    =+
 // FIN DEL ARCHIVO
 //===========================================================    =+
/**/
?>