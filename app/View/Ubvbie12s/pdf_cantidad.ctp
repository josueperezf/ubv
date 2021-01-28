<?php 
 App::import('Vendor','tcpdf/tcpdf');  
 ob_clean();
	$subnom=$enviar[0]['subnom'];
	$dennom=$enviar[0]['dennom'];
	$auxuad='';
	$total=0;
	//echo "sub nom  ".$subnom."<br>";	
 
//debug($enviar);
 class MYPDF extends TCPDF {
// $GLOBALS['elquequiera'] = 'chiky';
	//Page header
	public function header()
	{
		$tipoLetra="times";
		$img1="img/ubv1.jpg";
		//$this->SetDrawColor(200);
		//$this->SetTextColor(200);
		//$this->StartTransform();
		//$this->MirrorP(70,170);
		$this->Image($img1,10,10,20,20,'JPG','','',true,150,'',false,false,false,false,false,false);    
		
		//$this->StopTransform();

		//$this->SetY(26);
		$fecha=date("d-m-Y");
	//	$this->SetFont($tipoLetra, 'B', 14, '', true);
		$this->SetFont($tipoLetra, '', 11, '', true);
	//	$this->SetFont($tipoLetra, 'B', 13, '', true);
		$this->Cell(0, 0,'  ', '', 1, 'R', 0, '', 1);
		$this->Cell(0, 0,'RREPUBLICA BOLIVARIANA DE VENEZUELA', '', 1, 'R', 0, '', 0);
		$this->Cell(0, 0,'UNIVERSIDAD BOLIVARIANA DE VENEZUELA', '', 1, 'R', 0, '', 0);
		$this->Cell(0, 0,'Cantidad por Bien', '', 1, 'R', 0, '', 1);
		$this->Cell(0, 0,$fecha, '', 1, 'R', 0, '', 1);
//		$this->Cell(0, 0,$elquequiera, '', 1, 'R', 0, '', 1);
		$this->Ln();
	 }

	// Page footer

}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$fecha=date("d-m-Y");
if(@($enviar=='')||($enviar==NULL))
{
	$imgerror='img/warning.jpg';
	$pdf->jl_error($imgerror,'Que Pena Ocurrio un ERROR verifica e intenta de nuevo');

	}else
	{
	$pdf->SetAuthor('Josue Perez');
	$pdf->SetTitle('Josue ejemplo');
	$pdf->SetSubject('trabajo');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
	$pdf->SetMargins(10, 35, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) 
	{
		require_once(dirname(__FILE__).'/lang/eng.php');
		$pdf->setLanguageArray($l);
	}
	$hojaorientacion='P';
	$hojatamano='A4';
	$pdf->AddPage($hojaorientacion,$hojatamano);
	$tipoLetra=$tipoLetra="times";
	$pdf->SetFont('times', '', 12);
	$pdf->Cell(0, 0,'Sub-Coordinacion:'.$enviar[0]['subnom'], '', 1, 'L', 0, '', 0);
	$pdf->Cell(0, 0,'Denominacion:'.$enviar[0]['dennom'], '', 1, 'L', 0, '', 0);
				$pdf->SetFillColor(200, 255, 200);
		foreach ($enviar as $key) 
			{
				
				if($auxuad!=$key['uadnom'])
				{
					$auxuad=$key['uadnom'];
					$pdf->Ln();
					//$pdf->SetFillColor(255, 0, 0); 
					$pdf->SetFillColor(200, 240, 320); 
					$pdf->Cell(0, 0,'     Unidad Administrativa:  '.$key['uadnom'], 1, 1, 'L', 1, '', 0);
					//$this->Cell(180, 6, 'Chapter '.$num.' : '.$title, 0, 1, '', 1);
				}
				$pdf->Cell(0, 0,'                  '.$key['dusnom'].': '.$key['cantidad'], 1, 1, 'L', 0, '', 0);
				$total+=$key['cantidad'];
			//	echo"Unidad Administrativa ".$key['uadnom']."<br>";
			//	echo"dependencia usuaria ".$key['dusnom']."<br>";
			//	echo"denominacion ".$key['dennom']."<br>";
			//	echo"cantidad ".$key['cantidad']."<br>";
				
				//echo"key['cantidad']".$key['cantidad']."<br>";
				

				//	debug($key);	
			}
		$pdf->Ln();

		$pdf->SetFillColor(200, 240, 320);
		$pdf->Cell(50, 0,'Total', 1, 1, 'L', 1, '', 0);
		$pdf->Cell(50, 0,$total, 1, 1, 'L', 0, '', 0);



}
$pdf->Output('cantidad'.$fecha.'.pdf', 'I');
exit;
 //===========================================================    =+
 // FIN DEL ARCHIVO
 //===========================================================    =+
/**/
?>