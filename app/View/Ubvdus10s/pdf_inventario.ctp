<?php
//echo "<br><br><br><br>hola  $data <br><br><br><br><br>";
//echo "<br><br><br><br>pernombre  ".$data[0]['per']['pernombre']." <br><br><br><br><br>";
//debug($this->request);
//debug($data);
 date_default_timezone_set("America/Caracas");
 App::import('Vendor','tcpdf/tcpdf');  
 ob_clean();
 // create new PDF document
 $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 $fecha=date("d-m-Y");
/* echo"<pre>";
 var_dump($data);
  echo"</pre>";*/
  if(empty($data))
  {
	  $data=NULL;
  }elseif(@($data[0]['per']['pernombre']=='')||($data[0]['per']['pernombre']==NULL))
{
	 $imgerror='img/warning.jpg';
$pdf->jl_error($imgerror,'No se encuentra definido el Nombre del Jefe de la Dependencia');

}

	 $pdf->SetCreator("JL Software");
	 $pdf->SetAuthor('Perez Josue');
	 $pdf->SetTitle('PDF Inventario');
	 $pdf->SetSubject('PDF UBV');
	 $numeroLineas=37;
	 $tipoLetra="times";
	 $fecha=date("d-m-Y");
	 $hojaorientacion='P';
	 $hojatamano='A4';
	 $titulo='INVENTARIO DE BIENES NACIONALES';
	 $pensamiento1='"La corrupcion corroe nuestra alma cuando no tenemos moral" ';
	 $pensamiento2='"Simon Bolivar"';
	 $w=array(20,26,103,21,20);
	 $caracteres=array(10,10,76,9,9,2);
	 $inicio=$lineasImpresas=$faltan=$lineasImpresas2=$costototal=$I=0;
	 $columnas=count($caracteres);
	 $SL=2;
 	 $img1='img/ubv1.jpg';
 	 $img2='img/ubv2.jpg';
 	 $unidadAdministrati=$dependenciaUsuaria='';
 	 $jefedus='';
 	 $cedula='';
 if (($data==NULL) || ($data=='')) 
 {
	//$pdf->jl_error($imgerror,'ERROR en el parametro, verifica los datos e intenta de nuevo');
 	$pdf->AddPage($hojaorientacion,$hojatamano);
	$pdf->headerinventario($img1,$img2,$titulo,$unidadAdministrati,$dependenciaUsuaria,$w,$tipoLetra,'inventario');
	$pdf->SetFont($tipoLetra, '', 9, '', true);
	$pdf->imprimelineassindatos($numeroLineas,0,$w);
	$pdf->SetFont($tipoLetra, 'B', 10, '', true);  
	$pdf->footerinventario($pensamiento1,$pensamiento2,$w,$jefedus,$cedula);
 	//$data = array('' => '' );
}else
{


 $unidadAdministrati=$data[0]['uad']['uadnomb'];
 $dependenciaUsuaria=$data[0]['dus']['dusnomb'];
 $jefedus=$data[0]['per']['pernombre'];
 $cedula=$data[0]['per']['cedula'];
 $auxiliar=array();
 foreach($data as $data2)
 {
	 if(($data2['bie']['bieserial']=='') || ($data2['bie']['bieserial']==NULL))
	 {	 $data2['bie']['bieserial']='No aplica';
	 }

	 $auxiliar[$I]=array('numeroBien'=>$data2['bie']['biecodigo'],
	                     'codigoCatalogo'=>$data2['cat']['catcodigo'],
'descripcion'=>$data2['den']['dennombre'].', Marca: '.$data2['mar']['marnombre'].', S/N: '.$data2['bie']['bieserial'].',  '.$data2['bie']['biedesc'],
                         'unitario'=>$data2['bie']['biemonto'],
						 'total'=>'',
						 'salto'=>'no');
	 $paracontar[$I]=$data2['den']['dennombre'];
 $I++;
 }
 $auxiliarparacontar=array_unique($paracontar);
 $data=$auxiliar;
 $keys=array_keys($data[0]);
 
 $data=$pdf->arraysaltolinea($SL,$caracteres,$data);
 if($data==FALSE)echo"alguno de los parametros esta erroneo <br>";
 $total=count($data);
 $total-=$SL;
 $page=ceil($total/$numeroLineas);
 
//////////////////////////////////////////////////////////////////////////////////////////////////////
/////                    comienza la creacion del pdf                                           /////
////////////////////////////////////////////////////////////////////////////////////////////////////
if($total==0)
{
	$pdf->AddPage($hojaorientacion,$hojatamano);
	$pdf->headerinventario($img1,$img2,$titulo,$unidadAdministrati,$dependenciaUsuaria,$w,$tipoLetra,'inventario');
	$pdf->SetFont($tipoLetra, '', 9, '', true);
	$pdf->imprimelineassindatos($numeroLineas,0,$w);
	$pdf->SetFont($tipoLetra, 'B', 10, '', true);  
	$pdf->footerinventario($pensamiento1,$pensamiento2,$w,$jefedus,$cedula);
//	echo "no trae datos data  jefedus  ".$jefedus."  cedula  ".$cedula."<br>";

}else
{
//	echo "si trae datos data  jefedus  ".$jefedus."  cedula  ".$cedula."<br>";
//	echo "en total != 0 <br>";
	for($I=0;$I<$page;$I++)
	{
		if($I<($page-1))
		{
//			echo "pagina menor a page <br>";
			$pdf->AddPage($hojaorientacion,$hojatamano);
			$pdf->headerinventario($img1,$img2,$titulo,$unidadAdministrati,$dependenciaUsuaria,$w,$tipoLetra,'inventario');
			$pdf->SetFont($tipoLetra, '', 9, '', true);
			$retornar=$pdf->imprimelineascondatos($numeroLineas,$lineasImpresas,$data,$w);
			$costototal+=$retornar['costototal'];
			//echo"costototal ".$costototal."<br>";
			$lineasImpresas=$retornar['lineasImpresas'];
			$faltan=$total-$lineasImpresas;
			$pdf->SetFont($tipoLetra, 'B', 10, '', true);
			$pdf->footerinventario($pensamiento1,$pensamiento2,$w,$jefedus, $cedula);
		} 
		if($I==($page-1))
		{
			$pdf->AddPage($hojaorientacion,$hojatamano);
			$pdf->headerinventario($img1,$img2,$titulo,$unidadAdministrati,$dependenciaUsuaria,$w,$tipoLetra,'inventario');
			$pdf->SetFont($tipoLetra, '', 9, '', true);
			$faltan=$total-$lineasImpresas;
			$retornar=$pdf->imprimelineascondatos($faltan,$lineasImpresas,$data,$w);
			$costototal+=$retornar['costototal'];
			$lineasImpresas=$retornar['lineasImpresas'];
			$pdf->imprimelineassindatos($numeroLineas,$faltan,$w);
			$pdf->Cell($w[0]+$w[1], 0,'', 1, 0, '1', 0, '', 0);
			$pdf->Cell($w[2]-25, 0,'', 1, 0, '1', 0, '', 0);
			$pdf->Cell($w[3]+4, 0,'Total:', 1, 0, '1', 0, '', 0);
			$pdf->Cell($w[3], 0,$costototal, 1, 0, '1', 0, '', 0);
			$pdf->Cell($w[3]-1, 0,'', 1, 0, '1', 0, '', 0);
			$pdf->Ln(); 
			$pdf->SetFont($tipoLetra, 'B', 10, '', true);
			$pdf->footerinventario($pensamiento1,$pensamiento2,$w,$jefedus,$cedula);
			/////////////////////////////////////////////////////////////////////////////////////////
			// creo que aqui es donde tiene que ir el llamado a hacer las otras hojas que mostraran//
			// los totales por articulo                                                            //
			//consta de una funcion distintos que separara de la data ya existente los repetidos   // 
			// una funcion contar que retornara la cantidad de iteraciones por cada articulo       // 
			// de esa forma traera la cantidad de articulos..                                      //
			/////////////////////////////////////////////////////////////////////////////////////////
			$total2=0;
			$total2=count($auxiliarparacontar);
			$page2=ceil($total2/$numeroLineas);
			//echo "total2 $total2<br>";
			if($total2==0)
			{
			}else
			{
				for($I=0;$I<$page2;$I++)
				{
					if($I<($page2-1))
					{
						$pdf->AddPage($hojaorientacion,$hojatamano);
						$pdf->headerinventario($img1,$img2,$titulo,$unidadAdministrati,$dependenciaUsuaria,$w,$tipoLetra,'descripcion');
						$pdf->SetFont($tipoLetra, '', 9, '', true);
						$X[0]=$w[2]+$w[1]+$w[3]+$w[0];
						$X[1]=$w[4];
						$datacontada=$pdf->contarInventario($paracontar,$auxiliarparacontar);
						$retornar=$pdf->imprimelineascondatos($numeroLineas,0,$datacontada,$X);
						$lineasImpresas2=$retornar['lineasImpresas'];
						$pdf->SetFont($tipoLetra, 'B', 10, '', true);
						$pdf->footerinventario($pensamiento1,$pensamiento2,$w,$jefedus,$cedula);
					}
					if($I==($page2-1))
					{
						$faltan2=$total2-$lineasImpresas2;
						$pdf->AddPage($hojaorientacion,$hojatamano);
						$pdf->headerinventario($img1,$img2,$titulo,$unidadAdministrati,$dependenciaUsuaria,$w,$tipoLetra,'descripcion');
						$pdf->SetFont($tipoLetra, '', 9, '', true);
						$X[0]=$w[2]+$w[1]+$w[3]+$w[0];
						$X[1]=$w[4];
						$datacontada=$pdf->contarInventario($paracontar,$auxiliarparacontar);
						$retornar=$pdf->imprimelineascondatos($faltan2,$lineasImpresas2,$datacontada,$X);
						$lineasImpresas2=$retornar['lineasImpresas'];
						$pdf->SetFont($tipoLetra, 'B', 10, '', true);
						$pdf->imprimelineassindatos($numeroLineas,$faltan2,$X);
						$pdf->footerinventario($pensamiento1,$pensamiento2,$w,$jefedus,$cedula);	
					}
				}
			}
			
	/*	echo "<br><br>";

			print_r($datacontada);
		echo "<br><br>";*/
		
		//	echo "numeroLineas ".$numeroLineas." lineasImpresas ".$lineasImpresas;
			
			//echo "hola<br>";
			
		}
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